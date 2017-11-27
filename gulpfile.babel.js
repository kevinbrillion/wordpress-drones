'use strict';

import autoprefixer from 'gulp-autoprefixer';
import bump         from 'gulp-bump';
import concat       from 'gulp-concat';
import cssnano      from 'gulp-cssnano';
import del          from 'del';
import environments from 'gulp-environments';
import glob         from 'glob';
import gulp         from 'gulp';
import header       from 'gulp-header';
import jeditor      from 'gulp-json-editor';
import newer        from 'gulp-newer';
import plumber      from 'gulp-plumber';
import replace      from 'gulp-replace-task';
import rollup       from 'gulp-rollup';
import sass         from 'gulp-sass';
import uglify       from 'gulp-uglify';
import watch        from 'gulp-watch';
import imagemin     from 'gulp-imagemin';


/* Define environments */
let development = environments.development,
    production  = environments.production;


/* Load Package info */
let pkg = require('./package.json');


/* Define project paths and special files */
const base = {
    root : '.',
    tmp  : './tmp',
    src  : 'src',
    dest : '_' + pkg.name
};

const wpFiles = {
    style      : `${base.src}/templates/style.css`,
    screenshot : `${base.src}/templates/screenshot.png`,
    enqueuer   : `${base.src}/templates/lib/scripts-and-styles.php`
}

const routes = {
    scripts: {
        watch : `${base.src}/es6/**/*.js`,
        src   : `${base.src}/es6/**/*.js`,
        dest  : `${base.dest}/js/`,
        entry : `${base.src}/es6/${pkg.main}`,
    },
    styles: {
        watch : `${base.src}/scss/**/*.scss`,
        src   : `${base.src}/scss/style.scss`,
        dest  : `${base.dest}/`
    },
    templates: {
        watch : `${base.src}/templates/**/*`,
        src   : [
            `${base.src}/templates/**/*`,
            `!${wpFiles.style}`,
            `!${wpFiles.enqueuer}`
        ],
        dest  : `${base.dest}/`
    },
    vendor: {
        css   : `${base.src}/vendor/css/**/*.css`,
        js    : `${base.src}/vendor/js/**/*.js`
    },
    images: {
        src : `${base.src}/img/**`,
        dest: `${base.dest}/img/`
    },
    fonts: {
        src : `${base.src}/fonts/**`,
        dest: `${base.dest}/fonts/`
    }
};


/* Replacements */
let replacements = {
    common: [
            { match: "theme_title"       , replacement: pkg.title },
            { match: "theme_uri"         , replacement: pkg.repository.url },
            { match: "theme_author"      , replacement: pkg.author.name },
            { match: "theme_author_uri"  , replacement: pkg.author.url },
            { match: "theme_description" , replacement: pkg.description },
            { match: "theme_version"     , replacement: pkg.version },
            { match: "theme_keywords"    , replacement: pkg.keywords.join(', ') },
            { match: "theme_name"        , replacement: pkg.name.replace(/-/g, '_') }
    ],
    development: (() => {

        let repl = [];

        if (glob.sync(routes.vendor.css).length !== 0) {
            repl.push({ match: "vendor_styles"                 , replacement: `\n    wp_enqueue_style( 'vendor-styles', THEMEURI . '/vendor.min.css', [], '${pkg.version}' );` });
            repl.push({ match: "vendor_styles_dependencies"    , replacement: "'vendor-styles'" });
            repl.push({ match: "styles_version"                , replacement: `'${pkg.version}+${pkg.build.css}-${+ new Date()}'`});
        } else {
            repl.push({ match: "vendor_styles"                 , replacement: "" });
            repl.push({ match: "vendor_styles_dependencies"    , replacement: "" });
            repl.push({ match: "styles_version"                , replacement: `'${pkg.version}+${pkg.build.css}-${+ new Date()}'`});
        }

        if (glob.sync(routes.vendor.js).length !== 0) {
            repl.push({ match: "vendor_scripts"                , replacement: `\n    wp_enqueue_script( 'vendor-scripts', THEMEURI . '/js/vendor.min.js', [], '${pkg.version}', true );` });
            repl.push({ match: "vendor_script_dependencies"    , replacement: "'vendor-scripts'" });
            repl.push({ match: "script_version"                , replacement: `'${pkg.version}+${pkg.build.js}-${+ new Date()}'`});
        } else {
            repl.push({ match: "vendor_scripts"                , replacement: "" });
            repl.push({ match: "vendor_script_dependencies"    , replacement: "" });
            repl.push({ match: "script_version"                , replacement: `'${pkg.version}+${pkg.build.js}-${+ new Date()}'`});
        }

        return repl;

    })(),
    production: [
        { match: "vendor_scripts"                , replacement: "" },
        { match: "vendor_script_dependencies"    , replacement: "" },
        { match: "script_version"                , replacement: `'${pkg.version}+${pkg.build.js}'`},
        { match: "vendor_styles"                 , replacement: "" },
        { match: "vendor_styles_dependencies"    , replacement: "" },
        { match: "styles_version"                , replacement: `'${pkg.version}+${pkg.build.css}'`},
    ]
}


gulp.task('semver:patch', () => {
    return gulp.src('./package.json')
        .pipe(bump())
        .pipe(gulp.dest('./'));
});


gulp.task('semver:minor', () => {
    return gulp.src('./package.json')
        .pipe(bump({type: 'minor'}))
        .pipe(jeditor(function(pkg) {
            pkg.build.js = 1;
            pkg.build.css = 1;
            return pkg;
        }))
        .pipe(gulp.dest('./'));
});


gulp.task('semver:major', () => {
    return gulp.src('./package.json')
        .pipe(bump({type: 'major'}))
        .pipe(jeditor(function(pkg) {
            pkg.build.js = 1;
            pkg.build.css = 1;
            return pkg;
        }))
        .pipe(gulp.dest('./'));
});


gulp.task('clean:tmp', () => {
    return del(base.tmp);
});


gulp.task('clean', ['clean:tmp'], () => {
    return del(base.dest);
});


gulp.task('styles:transpile', () => {
    return gulp.src(routes.styles.src)
        .pipe(plumber())
        .pipe(sass())
        .pipe(production(cssnano({ discardComments: true })))
        .pipe(autoprefixer())
        .pipe(gulp.dest(base.tmp));
});


gulp.task('styles:concat', ['styles:transpile'], () => {
    if (production()) {
        return gulp.src([wpFiles.style, routes.vendor.css, base.tmp + '/**/*.css'])
            .pipe(concat('style.css'))
            .pipe(replace({ patterns: replacements.common }))
            .pipe(cssnano({ discardComments: false }))
            .pipe(gulp.dest(routes.styles.dest));
    } else {
        gulp.src(routes.vendor.css)
            .pipe(concat('vendor.min.css'))
            .pipe(cssnano({ discardComments: true }))
            .pipe(newer(routes.styles.dest))
            .pipe(gulp.dest(routes.styles.dest));
        return gulp.src([wpFiles.style, base.tmp + '/**/*.css'])
            .pipe(concat('style.css'))
            .pipe(replace({ patterns: replacements.common }))
            .pipe(gulp.dest(routes.styles.dest));
    }
});


gulp.task('scripts:transpile', () => {
    return gulp.src(routes.scripts.src)
        .pipe(rollup({
            format: 'iife',
            plugins: [
                require('rollup-plugin-babel')({
                    presets : [['es2015', { 'modules': false }]],
                    plugins : ['external-helpers'],
                    babelrc : false
                })
            ],
            entry: routes.scripts.entry
        }))
        .pipe(gulp.dest(base.tmp));
});


gulp.task('scripts:concat', ['scripts:transpile'], () => {
    let banner = '/* <%= pkg.title %> – Author: <%= pkg.author.name %> <<%= pkg.author.email %>> Version: <%= pkg.version %>+<%= pkg.build.js %> */\n';

    if (production()) {
        banner += '/* DISCLAIMER: This is an automatically generated file that may also contain code from other authors. */\n'
        return gulp.src([routes.vendor.js, base.tmp + '/**/*.js'])
            .pipe(concat(pkg.main))
            .pipe(uglify())
            .pipe(header(banner, { pkg : pkg } ))
            .pipe(gulp.dest(routes.scripts.dest));
    } else {
        gulp.src(routes.vendor.js)
            .pipe(concat('vendor.min.js'))
            .pipe(uglify())
            .pipe(newer(routes.scripts.dest))
            .pipe(gulp.dest(routes.scripts.dest));
        return gulp.src(base.tmp + '/**/*.js')
            .pipe(concat(pkg.main))
            .pipe(header(banner, { pkg : pkg } ))
            .pipe(gulp.dest(routes.scripts.dest));
    }
});


/* Images */
gulp.task('images:imagemin', () => {
    console.log(routes.images.dest)
    return gulp.src([routes.images.src])
    .pipe(imagemin())
    .pipe(gulp.dest(routes.images.dest))
})

/* Images */
gulp.task('fonts', () => {
    return gulp.src([routes.fonts.src])
    .pipe(gulp.dest(routes.fonts.dest))
})


gulp.task('incbuild:css', () => {
    gulp.src('./package.json')
        .pipe(jeditor((pkg) => {
            pkg.build.css = parseInt(pkg.build.css) + 1;
            return pkg;
        }))
        .pipe(gulp.dest('./'));
});


gulp.task('incbuild:js', () => {
    gulp.src('./package.json')
        .pipe(jeditor((pkg) => {
            pkg.build.js = parseInt(pkg.build.js) + 1;
            return pkg;
        }))
        .pipe(gulp.dest('./'));
});


gulp.task('incbuild:all', () => {
    gulp.src('./package.json')
        .pipe(jeditor((pkg) => {
            pkg.build.js = parseInt(pkg.build.js) + 1;
            pkg.build.css = parseInt(pkg.build.css) + 1;
            return pkg;
        }))
        .pipe(gulp.dest('./'));
});


gulp.task('enqueue', ['scripts:concat', 'styles:concat'], () => {
    return gulp.src(wpFiles.enqueuer, {base: `${base.src}/templates/`})
        .pipe(replace({ patterns: replacements.common }))
        .pipe(development(replace({ patterns: replacements.development })))
        .pipe(production(replace({ patterns: replacements.production })))
        .pipe(gulp.dest(routes.templates.dest))
});


gulp.task('templates', () => {
    return gulp.src(routes.templates.src, {base: `${base.src}/templates/`})
    .pipe(newer(routes.templates.dest))
    .pipe(replace({ patterns: replacements.common }))
    .pipe(gulp.dest(routes.templates.dest))
});


gulp.task('build', ['clean', 'incbuild:all'], () => {
    gulp.start('templates');
    gulp.start('enqueue');
    gulp.start('images:imagemin');
    gulp.start('fonts');
});


gulp.task('develop', ['build'], () => {
    environments.current(development);
    gulp.watch(routes.templates.watch, ['templates']);
    gulp.watch(routes.styles.watch, ['incbuild:css', 'styles:concat']);
    gulp.watch(routes.scripts.watch, ['incbuild:js', 'scripts:concat']);
    gulp.watch(routes.fonts.src, ['fonts']);
});

gulp.task('default', ['develop']);
