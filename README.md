## Requeriments

+ [Node.js](https://nodejs.org/en/)
+ [Gulp](http://gulpjs.com)


## Installation

1. Clone this package

```bash
git clone https://github.com/kevinbrillion/wordpress-drones.git
cd wp-theme-starter/
``````

2. Install dependencies

```bash
npm install
```

## Usage

1. Place your server code and static files in `src/templates/`.
2. Place your styles in `src/scss/`
3. Add your Javascript with ES6 syntax in `src/es6/`
4. If you need to load any third-party libraries, place them in the corresponding `vendor/css` or `vendor/js` folders.

### Building your theme

To build your project, use:

```bash
gulp build --env <environment>
```

where `<environment>` should be:

+ `development` ***(default)***
All your SCSS will be trasnspiled to a non-minified `<dist>/style.css` with a valid WP stylesheet header. ES6 code will be transpiled to `<dist>/js/main.js`. Vendor code, if any, will be concatenated to `<dist>/vendor.min.css` and `<dist>/js/vendor.min.js` and properly enqueued to Wordpress, to not interfere your code on debugging.

+ `production`
All scripts and styles (both yours and vendors) will be concatenated, minified/uglified and enqueued to Wordpress in `<dist>/style.css` and `<dist>/js/main.js`.

### Developing

Executing `gulp develop` or just `gulp` will do a first build on development environment and then will *watch* for changes on templates, styles and scripts to automatically rebuild those items.

**Versioning**
The project provides `semver:major`, `semver:minor` and `semver:patch` tasks which automatically increases the proper digit on `package.json`'s version number.

Execute them in the terminal as:

```bash
gulp semver:major
gulp semver:minor
gulp semver:patch
```

Also, *major* and *minor* reset the JS and CSS build counts but *patch* doesn't.
