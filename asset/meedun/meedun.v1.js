/**
 *   [Meedun description]
 *   meedun.v1.js
 *   @type {Object}
 */
var Meedun = {
  base: 1,
  ver :'meedun.v1.js',
  version: function(){
  	return this.ver;
  },
  
  add: function(a) {
    var f = v => v + this.base;
    return f(a);
  },

  addThruCall: function(a) {
    var f = v => v + this.base;
    var b = {
      base: 2
    };

    return f.call(b, a);
  }
};
Meedun.version();






// function declaration
function meeduns() {

}


/**
 *   [meedun function expression]
 *   @method      meedun
 *   @author Meedun
 *   @date        2019-10-20
 *   @file        file_name()
 *   @anotherdate 2019-10-20T20:31:31+0700
 *   @version     [version]
 *   @return      {[type]}                 [description]
 */
var meeduns = function() {
  // ...
  	 console.log('meedun.v1.js');
  	 var a = 1;
  	 var b = (a+2);
  	return b+'kkkk';
}


