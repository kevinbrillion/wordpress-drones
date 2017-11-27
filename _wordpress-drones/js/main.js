/* Wordpress Parrot Project – Author: Kevin Brillion <kevin.brillion@hetic.net> Version: 0.1.0+83 */
(function () {
'use strict';

var asyncGenerator = function () {
  function AwaitValue(value) {
    this.value = value;
  }

  function AsyncGenerator(gen) {
    var front, back;

    function send(key, arg) {
      return new Promise(function (resolve, reject) {
        var request = {
          key: key,
          arg: arg,
          resolve: resolve,
          reject: reject,
          next: null
        };

        if (back) {
          back = back.next = request;
        } else {
          front = back = request;
          resume(key, arg);
        }
      });
    }

    function resume(key, arg) {
      try {
        var result = gen[key](arg);
        var value = result.value;

        if (value instanceof AwaitValue) {
          Promise.resolve(value.value).then(function (arg) {
            resume("next", arg);
          }, function (arg) {
            resume("throw", arg);
          });
        } else {
          settle(result.done ? "return" : "normal", result.value);
        }
      } catch (err) {
        settle("throw", err);
      }
    }

    function settle(type, value) {
      switch (type) {
        case "return":
          front.resolve({
            value: value,
            done: true
          });
          break;

        case "throw":
          front.reject(value);
          break;

        default:
          front.resolve({
            value: value,
            done: false
          });
          break;
      }

      front = front.next;

      if (front) {
        resume(front.key, front.arg);
      } else {
        back = null;
      }
    }

    this._invoke = send;

    if (typeof gen.return !== "function") {
      this.return = undefined;
    }
  }

  if (typeof Symbol === "function" && Symbol.asyncIterator) {
    AsyncGenerator.prototype[Symbol.asyncIterator] = function () {
      return this;
    };
  }

  AsyncGenerator.prototype.next = function (arg) {
    return this._invoke("next", arg);
  };

  AsyncGenerator.prototype.throw = function (arg) {
    return this._invoke("throw", arg);
  };

  AsyncGenerator.prototype.return = function (arg) {
    return this._invoke("return", arg);
  };

  return {
    wrap: function (fn) {
      return function () {
        return new AsyncGenerator(fn.apply(this, arguments));
      };
    },
    await: function (value) {
      return new AwaitValue(value);
    }
  };
}();





var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();

/** Class */
var ParallaxHome = function () {
    function ParallaxHome() {
        classCallCheck(this, ParallaxHome);

        this.image = document.querySelector('.landing__img');
        this.imageWidth = this.image.offsetWidth / 2;
        this.innerHeight = window.innerHeight / 2;
        this.innerWidth = window.innerWidth / 2 - this.imageWidth;
        console.log(this.imageWidth);

        this.initParallax();
    }

    createClass(ParallaxHome, [{
        key: 'initParallax',
        value: function initParallax() {
            var _this = this;

            window.addEventListener('mousemove', function (e) {
                _this.image.style.transform = 'translate3d(' + (_this.innerWidth - e.screenX) / 15 + 'px, ' + (_this.innerHeight - e.screenY) / 15 + 'px, 0)';
            });
        }
    }]);
    return ParallaxHome;
}();

/** Class */
var Player = function () {
    /**
     *
     */
    function Player() {
        classCallCheck(this, Player);

        this.video = document.querySelector('.video');
        console.log(this.video);

        this.pausePlay();
    }

    createClass(Player, [{
        key: 'pausePlay',
        value: function pausePlay() {
            var _this = this;

            this.video.addEventListener('click', function () {
                console.log('click');
                if (_this.video.paused) {
                    _this.video.play();
                } else {
                    _this.video.pause();
                }
            });
        }
    }]);
    return Player;
}();

// Do your frontend magic here :)


var parallax = new ParallaxHome();

var player = new Player();

}());
