<<<<<<< HEAD
!function(e){var t={};function n(r){if(t[r])return t[r].exports;var s=t[r]={i:r,l:!1,exports:{}};return e[r].call(s.exports,s,s.exports,n),s.l=!0,s.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var s in e)n.d(r,s,function(t){return e[t]}.bind(null,s));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=314)}({0:function(e,t){e.exports=window.wp.element},1:function(e,t){e.exports=window.wp.i18n},136:function(e,t,n){"use strict";n.d(t,"a",(function(){return r}));class r extends Error{constructor(e,t){super(e),this.name="ParseError",this.parseString=t}}},140:function(e,t,n){"use strict";function r(e,t){const n=new URL(e);return n.searchParams.delete(t),n.href}function s(e,t,n){window.history.pushState(e,t,n)}n.d(t,"b",(function(){return r})),n.d(t,"a",(function(){return s}))},16:function(e,t){e.exports=window.yoast.styleGuide},18:function(e,t){e.exports=window.jQuery},2:function(e,t){e.exports=window.yoast.propTypes},314:function(e,t,n){"use strict";n.r(t);var r=n(0),s=n(18),i=n.n(s),o=n(1),a=n(7),c=n(16),d=n(2),l=n.n(d),u=n(140),p=n(95),g=n(8),m=n.n(g);const h=m.a.div`
	margin-top: 8px;
`,x=m.a.pre`
	overflow-x: scroll;
	max-width: 500px;
	border: 1px solid;
	padding: 16px;
`;function b(e){let{title:t,value:n}=e;return n?Object(r.createElement)("p",null,Object(r.createElement)("strong",null,t),Object(r.createElement)("br",null),n):null}function w(e){let{title:t,value:n}=e;return n?Object(r.createElement)("details",null,Object(r.createElement)("summary",null,t),Object(r.createElement)(x,null,n)):null}function f(e){let{message:t,error:n}=e;return Object(r.createElement)(a.Alert,{type:"error"},Object(r.createElement)("div",{dangerouslySetInnerHTML:{__html:t}}),Object(r.createElement)("details",null,Object(r.createElement)("summary",null,Object(o.__)("Error details","wordpress-seo")),Object(r.createElement)(h,null,Object(r.createElement)(b,{title:Object(o.__)("Request URL","wordpress-seo"),value:n.url}),Object(r.createElement)(b,{title:Object(o.__)("Request method","wordpress-seo"),value:n.method}),Object(r.createElement)(b,{title:Object(o.__)("Status code","wordpress-seo"),value:n.statusCode}),Object(r.createElement)(b,{title:Object(o.__)("Error message","wordpress-seo"),value:n.message}),Object(r.createElement)(w,{title:Object(o.__)("Response","wordpress-seo"),value:n.parseString}),Object(r.createElement)(w,{title:Object(o.__)("Error stack trace","wordpress-seo"),value:n.stackTrace}))))}b.propTypes={title:l.a.string.isRequired,value:l.a.any},b.defaultProps={value:""},w.propTypes={title:l.a.string.isRequired,value:l.a.string},w.defaultProps={value:""},f.propTypes={message:l.a.string.isRequired,error:l.a.oneOfType([l.a.instanceOf(Error),l.a.instanceOf(p.a)]).isRequired};var O=n(136);class y extends r.Component{constructor(e){super(e),this.settings=yoastIndexingData,this.state={state:"idle",processed:0,error:null,amount:parseInt(this.settings.amount,10),firstTime:"1"===this.settings.firstTime},this.startIndexing=this.startIndexing.bind(this),this.stopIndexing=this.stopIndexing.bind(this)}async doIndexingRequest(e,t){const n=await fetch(e,{method:"POST",headers:{"X-WP-Nonce":t}}),r=await n.text();let s;try{s=JSON.parse(r)}catch(e){throw new O.a("Error parsing the response to JSON.",r)}if(!n.ok){const t=s.data?s.data.stackTrace:"";throw new p.a(s.message,e,"POST",n.status,t)}return s}async doPreIndexingAction(e){"function"==typeof this.props.preIndexingActions[e]&&await this.props.preIndexingActions[e](this.settings)}async doPostIndexingAction(e,t){"function"==typeof this.props.indexingActions[e]&&await this.props.indexingActions[e](t.objects,this.settings)}async doIndexing(e){let t=this.settings.restApi.root+this.settings.restApi.indexing_endpoints[e];for(;this.isState("in_progress")&&!1!==t;)try{await this.doPreIndexingAction(e);const n=await this.doIndexingRequest(t,this.settings.restApi.nonce);await this.doPostIndexingAction(e,n),this.setState(e=>({processed:e.processed+n.objects.length,firstTime:!1})),t=n.next_url}catch(e){this.setState({state:"errored",error:e,firstTime:!1})}}async index(){for(const e of Object.keys(this.settings.restApi.indexing_endpoints))await this.doIndexing(e);this.isState("errored")||this.isState("idle")||this.completeIndexing()}async startIndexing(){this.setState({processed:0,state:"in_progress"},this.index)}completeIndexing(){this.setState({state:"completed"})}stopIndexing(){this.setState(e=>({state:"idle",processed:0,amount:e.amount-e.processed}))}componentDidMount(){if(!this.settings.disabled&&(this.props.indexingStateCallback(0===this.state.amount?"completed":this.state.state),"true"===new URLSearchParams(window.location.search).get("start-indexation"))){const e=Object(u.b)(window.location.href,"start-indexation");Object(u.a)(null,document.title,e),this.startIndexing()}}componentDidUpdate(e,t){this.state.state!==t.state&&this.props.indexingStateCallback(this.state.state)}isState(e){return this.state.state===e}renderFirstIndexationNotice(){return Object(r.createElement)(a.Alert,{type:"info"},Object(o.__)("This feature includes and replaces the Text Link Counter and Internal Linking Analysis","wordpress-seo"))}renderStartButton(){return Object(r.createElement)(a.NewButton,{variant:"primary",onClick:this.startIndexing},Object(o.__)("Start SEO data optimization","wordpress-seo"))}renderStopButton(){return Object(r.createElement)(a.NewButton,{variant:"secondary",onClick:this.stopIndexing},Object(o.__)("Stop SEO data optimization","wordpress-seo"))}renderDisabledTool(){return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("p",null,Object(r.createElement)(a.NewButton,{variant:"secondary",disabled:!0},Object(o.__)("Start SEO data optimization","wordpress-seo"))),Object(r.createElement)(a.Alert,{type:"info"},Object(o.__)("SEO data optimization is disabled for non-production environments.","wordpress-seo")))}renderProgressBar(){return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(a.ProgressBar,{style:{height:"16px",margin:"8px 0"},progressColor:c.colors.$color_pink_dark,max:parseInt(this.state.amount,10),value:this.state.processed}),Object(r.createElement)("p",{style:{color:c.colors.$palette_grey_text}},Object(o.__)("Optimizing SEO data... This may take a while.","wordpress-seo")))}renderErrorAlert(){return Object(r.createElement)(f,{message:yoastIndexingData.errorMessage,error:this.state.error})}renderTool(){return Object(r.createElement)(r.Fragment,null,this.isState("in_progress")&&this.renderProgressBar(),this.isState("errored")&&this.renderErrorAlert(),this.isState("idle")&&this.state.firstTime&&this.renderFirstIndexationNotice(),this.isState("in_progress")?this.renderStopButton():this.renderStartButton())}render(){return this.settings.disabled?this.renderDisabledTool():this.isState("completed")||0===this.state.amount?Object(r.createElement)(a.Alert,{type:"success"},Object(o.__)("SEO data optimization complete","wordpress-seo")):this.renderTool()}}y.propTypes={indexingActions:l.a.object,preIndexingActions:l.a.object,indexingStateCallback:l.a.func},y.defaultProps={indexingActions:{},preIndexingActions:{},indexingStateCallback:()=>{}};var j=y;let E;function _(){E||(E=document.getElementById("yoast-seo-indexing-action")),E&&Object(r.render)(Object(r.createElement)(j,{preIndexingActions:window.yoast.indexing.preIndexingActions,indexingActions:window.yoast.indexing.indexingActions}),E)}window.yoast=window.yoast||{},window.yoast.indexing=window.yoast.indexing||{},window.yoast.indexing.preIndexingActions={},window.yoast.indexing.indexingActions={},window.yoast.indexing.registerPreIndexingAction=(e,t)=>{window.yoast.indexing.preIndexingActions[e]=t,_()},window.yoast.indexing.registerIndexingAction=(e,t)=>{window.yoast.indexing.indexingActions[e]=t,_()},i()((function(){_()}))},7:function(e,t){e.exports=window.yoast.componentsNew},8:function(e,t){e.exports=window.yoast.styledComponents},95:function(e,t,n){"use strict";n.d(t,"a",(function(){return r}));class r extends Error{constructor(e,t,n,r,s){super(e),this.name="RequestError",this.url=t,this.method=n,this.statusCode=r,this.stackTrace=s}}}});
=======
!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=267)}({1:function(e,t){e.exports=window.wp.element},11:function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},e.exports.__esModule=!0,e.exports.default=e.exports},110:function(e,t,n){var r=n(13),o=n(65),s=n(198),i=n(199);function a(t){var n="function"==typeof Map?new Map:void 0;return e.exports=a=function(e){if(null===e||!s(e))return e;if("function"!=typeof e)throw new TypeError("Super expression must either be null or a function");if(void 0!==n){if(n.has(e))return n.get(e);n.set(e,t)}function t(){return i(e,arguments,r(this).constructor)}return t.prototype=Object.create(e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),o(t,e)},e.exports.__esModule=!0,e.exports.default=e.exports,a(t)}e.exports=a,e.exports.__esModule=!0,e.exports.default=e.exports},12:function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,t,r){return t&&n(e.prototype,t),r&&n(e,r),Object.defineProperty(e,"prototype",{writable:!1}),e},e.exports.__esModule=!0,e.exports.default=e.exports},13:function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},e.exports.__esModule=!0,e.exports.default=e.exports,n(t)}e.exports=n,e.exports.__esModule=!0,e.exports.default=e.exports},136:function(e,t,n){"use strict";n.d(t,"a",(function(){return x}));var r=n(12),o=n.n(r),s=n(11),i=n.n(s),a=n(21),c=n.n(a),u=n(23),l=n.n(u),p=n(13),d=n.n(p),f=n(110);var x=function(e){c()(s,e);var t,n,r=(t=s,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,r=d()(t);if(n){var o=d()(this).constructor;e=Reflect.construct(r,arguments,o)}else e=r.apply(this,arguments);return l()(this,e)});function s(e,t,n,o,a){var c;return i()(this,s),(c=r.call(this,e)).name="RequestError",c.url=t,c.method=n,c.statusCode=o,c.stackTrace=a,c}return o()(s)}(n.n(f)()(Error))},15:function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e},e.exports.__esModule=!0,e.exports.default=e.exports},16:function(e,t){function n(e,t,n,r,o,s,i){try{var a=e[s](i),c=a.value}catch(e){return void n(e)}a.done?t(c):Promise.resolve(c).then(r,o)}e.exports=function(e){return function(){var t=this,r=arguments;return new Promise((function(o,s){var i=e.apply(t,r);function a(e){n(i,o,s,a,c,"next",e)}function c(e){n(i,o,s,a,c,"throw",e)}a(void 0)}))}},e.exports.__esModule=!0,e.exports.default=e.exports},174:function(e,t,n){"use strict";n.d(t,"a",(function(){return x}));var r=n(12),o=n.n(r),s=n(11),i=n.n(s),a=n(21),c=n.n(a),u=n(23),l=n.n(u),p=n(13),d=n.n(p),f=n(110);var x=function(e){c()(s,e);var t,n,r=(t=s,n=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,r=d()(t);if(n){var o=d()(this).constructor;e=Reflect.construct(r,arguments,o)}else e=r.apply(this,arguments);return l()(this,e)});function s(e,t){var n;return i()(this,s),(n=r.call(this,e)).name="ParseError",n.parseString=t,n}return o()(s)}(n.n(f)()(Error))},18:function(e,t){e.exports=function(e,t){return t||(t=e.slice(0)),Object.freeze(Object.defineProperties(e,{raw:{value:Object.freeze(t)}}))},e.exports.__esModule=!0,e.exports.default=e.exports},189:function(e,t,n){"use strict";function r(e,t){var n=new URL(e);return n.searchParams.delete(t),n.href}function o(e,t,n){window.history.pushState(e,t,n)}n.d(t,"b",(function(){return r})),n.d(t,"a",(function(){return o}))},198:function(e,t){e.exports=function(e){return-1!==Function.toString.call(e).indexOf("[native code]")},e.exports.__esModule=!0,e.exports.default=e.exports},199:function(e,t,n){var r=n(65),o=n(200);function s(t,n,i){return o()?(e.exports=s=Reflect.construct,e.exports.__esModule=!0,e.exports.default=e.exports):(e.exports=s=function(e,t,n){var o=[null];o.push.apply(o,t);var s=new(Function.bind.apply(e,o));return n&&r(s,n.prototype),s},e.exports.__esModule=!0,e.exports.default=e.exports),s.apply(null,arguments)}e.exports=s,e.exports.__esModule=!0,e.exports.default=e.exports},2:function(e,t){e.exports=window.yoast.propTypes},200:function(e,t){e.exports=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}},e.exports.__esModule=!0,e.exports.default=e.exports},21:function(e,t,n){var r=n(65);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&r(e,t)},e.exports.__esModule=!0,e.exports.default=e.exports},23:function(e,t,n){var r=n(44).default,o=n(15);e.exports=function(e,t){if(t&&("object"===r(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return o(e)},e.exports.__esModule=!0,e.exports.default=e.exports},267:function(e,t,n){"use strict";n.r(t);var r,o,s=n(1),i=n(29),a=n.n(i),c=n(16),u=n.n(c),l=n(11),p=n.n(l),d=n(12),f=n.n(d),x=n(15),y=n.n(x),h=n(21),b=n.n(h),g=n(23),m=n.n(g),v=n(13),w=n.n(v),_=n(5),O=n.n(_),j=n(3),E=n(8),S=n(31),k=n(2),I=n.n(k),P=n(189),R=n(18),A=n.n(R),T=n(136),M=n(9),B=n.n(M),C=B.a.div(r||(r=A()(["\n\tmargin-top: 8px;\n"]))),q=B.a.pre(o||(o=A()(["\n\toverflow-x: scroll;\n\tmax-width: 500px;\n\tborder: 1px solid;\n\tpadding: 16px;\n"])));function D(e){var t=e.title,n=e.value;return n?Object(s.createElement)("p",null,Object(s.createElement)("strong",null,t),Object(s.createElement)("br",null),n):null}function N(e){var t=e.title,n=e.value;return n?Object(s.createElement)("details",null,Object(s.createElement)("summary",null,t),Object(s.createElement)(q,null,n)):null}function z(e){var t=e.message,n=e.error;return Object(s.createElement)(E.Alert,{type:"error"},Object(s.createElement)("div",{dangerouslySetInnerHTML:{__html:t}}),Object(s.createElement)("details",null,Object(s.createElement)("summary",null,Object(j.__)("Error details","wordpress-seo")),Object(s.createElement)(C,null,Object(s.createElement)(D,{title:Object(j.__)("Request URL","wordpress-seo"),value:n.url}),Object(s.createElement)(D,{title:Object(j.__)("Request method","wordpress-seo"),value:n.method}),Object(s.createElement)(D,{title:Object(j.__)("Status code","wordpress-seo"),value:n.statusCode}),Object(s.createElement)(D,{title:Object(j.__)("Error message","wordpress-seo"),value:n.message}),Object(s.createElement)(N,{title:Object(j.__)("Response","wordpress-seo"),value:n.parseString}),Object(s.createElement)(N,{title:Object(j.__)("Error stack trace","wordpress-seo"),value:n.stackTrace}))))}D.propTypes={title:I.a.string.isRequired,value:I.a.any},D.defaultProps={value:""},N.propTypes={title:I.a.string.isRequired,value:I.a.string},N.defaultProps={value:""},z.propTypes={message:I.a.string.isRequired,error:I.a.oneOfType([I.a.instanceOf(Error),I.a.instanceOf(T.a)]).isRequired};var F=n(174);var L=function(e){b()(x,e);var t,n,r,o,i,a,c,l,d=(c=x,l=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=w()(c);if(l){var n=w()(this).constructor;e=Reflect.construct(t,arguments,n)}else e=t.apply(this,arguments);return m()(this,e)});function x(e){var t;return p()(this,x),(t=d.call(this,e)).settings=yoastIndexingData,t.state={state:"idle",processed:0,error:null,amount:parseInt(t.settings.amount,10),firstTime:"1"===t.settings.firstTime},t.startIndexing=t.startIndexing.bind(y()(t)),t.stopIndexing=t.stopIndexing.bind(y()(t)),t}return f()(x,[{key:"doIndexingRequest",value:(a=u()(O.a.mark((function e(t,n){var r,o,s,i;return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,fetch(t,{method:"POST",headers:{"X-WP-Nonce":n}});case 2:return r=e.sent,e.next=5,r.text();case 5:o=e.sent,e.prev=6,s=JSON.parse(o),e.next=13;break;case 10:throw e.prev=10,e.t0=e.catch(6),new F.a("Error parsing the response to JSON.",o);case 13:if(r.ok){e.next=16;break}throw i=s.data?s.data.stackTrace:"",new T.a(s.message,t,"POST",r.status,i);case 16:return e.abrupt("return",s);case 17:case"end":return e.stop()}}),e,null,[[6,10]])}))),function(_x,e){return a.apply(this,arguments)})},{key:"doPreIndexingAction",value:(i=u()(O.a.mark((function e(t){return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof this.props.preIndexingActions[t]){e.next=3;break}return e.next=3,this.props.preIndexingActions[t](this.settings);case 3:case"end":return e.stop()}}),e,this)}))),function(e){return i.apply(this,arguments)})},{key:"doPostIndexingAction",value:(o=u()(O.a.mark((function e(t,n){return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof this.props.indexingActions[t]){e.next=3;break}return e.next=3,this.props.indexingActions[t](n.objects,this.settings);case 3:case"end":return e.stop()}}),e,this)}))),function(e,t){return o.apply(this,arguments)})},{key:"doIndexing",value:(r=u()(O.a.mark((function e(t){var n,r=this;return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:n=this.settings.restApi.root+this.settings.restApi.indexing_endpoints[t];case 1:if(!this.isState("in_progress")||!1===n){e.next=11;break}return e.prev=2,e.delegateYield(O.a.mark((function e(){var o;return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,r.doPreIndexingAction(t);case 2:return e.next=4,r.doIndexingRequest(n,r.settings.restApi.nonce);case 4:return o=e.sent,e.next=7,r.doPostIndexingAction(t,o);case 7:r.setState((function(e){return{processed:e.processed+o.objects.length,firstTime:!1}})),n=o.next_url;case 9:case"end":return e.stop()}}),e)}))(),"t0",4);case 4:e.next=9;break;case 6:e.prev=6,e.t1=e.catch(2),this.setState({state:"errored",error:e.t1,firstTime:!1});case 9:e.next=1;break;case 11:case"end":return e.stop()}}),e,this,[[2,6]])}))),function(e){return r.apply(this,arguments)})},{key:"index",value:(n=u()(O.a.mark((function e(){var t,n,r;return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:t=0,n=Object.keys(this.settings.restApi.indexing_endpoints);case 1:if(!(t<n.length)){e.next=8;break}return r=n[t],e.next=5,this.doIndexing(r);case 5:t++,e.next=1;break;case 8:this.isState("errored")||this.isState("idle")||this.completeIndexing();case 9:case"end":return e.stop()}}),e,this)}))),function(){return n.apply(this,arguments)})},{key:"startIndexing",value:(t=u()(O.a.mark((function e(){return O.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:this.setState({processed:0,state:"in_progress"},this.index);case 1:case"end":return e.stop()}}),e,this)}))),function(){return t.apply(this,arguments)})},{key:"completeIndexing",value:function(){this.setState({state:"completed"})}},{key:"stopIndexing",value:function(){this.setState((function(e){return{state:"idle",processed:0,amount:e.amount-e.processed}}))}},{key:"componentDidMount",value:function(){if(!this.settings.disabled&&(this.props.indexingStateCallback(0===this.state.amount?"completed":this.state.state),"true"===new URLSearchParams(window.location.search).get("start-indexation"))){var e=Object(P.b)(window.location.href,"start-indexation");Object(P.a)(null,document.title,e),this.startIndexing()}}},{key:"componentDidUpdate",value:function(e,t){this.state.state!==t.state&&this.props.indexingStateCallback(this.state.state)}},{key:"isState",value:function(e){return this.state.state===e}},{key:"renderFirstIndexationNotice",value:function(){return Object(s.createElement)(E.Alert,{type:"info"},Object(j.__)("This feature includes and replaces the Text Link Counter and Internal Linking Analysis","wordpress-seo"))}},{key:"renderStartButton",value:function(){return Object(s.createElement)(E.NewButton,{variant:"primary",onClick:this.startIndexing},Object(j.__)("Start SEO data optimization","wordpress-seo"))}},{key:"renderStopButton",value:function(){return Object(s.createElement)(E.NewButton,{variant:"secondary",onClick:this.stopIndexing},Object(j.__)("Stop SEO data optimization","wordpress-seo"))}},{key:"renderDisabledTool",value:function(){return Object(s.createElement)(s.Fragment,null,Object(s.createElement)("p",null,Object(s.createElement)(E.NewButton,{variant:"secondary",disabled:!0},Object(j.__)("Start SEO data optimization","wordpress-seo"))),Object(s.createElement)(E.Alert,{type:"info"},Object(j.__)("SEO data optimization is disabled for non-production environments.","wordpress-seo")))}},{key:"renderProgressBar",value:function(){return Object(s.createElement)(s.Fragment,null,Object(s.createElement)(E.ProgressBar,{style:{height:"16px",margin:"8px 0"},progressColor:S.colors.$color_pink_dark,max:parseInt(this.state.amount,10),value:this.state.processed}),Object(s.createElement)("p",{style:{color:S.colors.$palette_grey_text}},Object(j.__)("Optimizing SEO data... This may take a while.","wordpress-seo")))}},{key:"renderErrorAlert",value:function(){return Object(s.createElement)(z,{message:yoastIndexingData.errorMessage,error:this.state.error})}},{key:"renderTool",value:function(){return Object(s.createElement)(s.Fragment,null,this.isState("in_progress")&&this.renderProgressBar(),this.isState("errored")&&this.renderErrorAlert(),this.isState("idle")&&this.state.firstTime&&this.renderFirstIndexationNotice(),this.isState("in_progress")?this.renderStopButton():this.renderStartButton())}},{key:"render",value:function(){return this.settings.disabled?this.renderDisabledTool():this.isState("completed")||0===this.state.amount?Object(s.createElement)(E.Alert,{type:"success"},Object(j.__)("SEO data optimization complete","wordpress-seo")):this.renderTool()}}]),x}(s.Component);L.propTypes={indexingActions:I.a.object,preIndexingActions:I.a.object,indexingStateCallback:I.a.func},L.defaultProps={indexingActions:{},preIndexingActions:{},indexingStateCallback:function(){}};var U,J=L,$={},G={};function H(){U||(U=document.getElementById("yoast-seo-indexing-action")),U&&Object(s.render)(Object(s.createElement)(J,{preIndexingActions:$,indexingActions:G}),U)}window.yoast=window.yoast||{},window.yoast.indexing=window.yoast.indexing||{},window.yoast.indexing.registerPreIndexingAction=function(e,t){$[e]=t,H()},window.yoast.indexing.registerIndexingAction=function(e,t){G[e]=t,H()},window.yoast.indexation=window.yoast.indexing,window.yoast.indexation.registerPreIndexationAction=function(e,t){console.warn("Deprecated since 15.1. Use 'window.yoast.indexing.registerPreIndexingAction' instead."),window.yoast.indexing.registerPreIndexingAction(e,t)},window.yoast.indexation.registerIndexationAction=function(e,t){console.warn("Deprecated since 15.1. Use 'window.yoast.indexing.registerIndexingAction' instead."),window.yoast.indexing.registerIndexingAction(e,t)},a()((function(){H()}))},29:function(e,t){e.exports=window.jQuery},3:function(e,t){e.exports=window.wp.i18n},31:function(e,t){e.exports=window.yoast.styleGuide},44:function(e,t){function n(t){return e.exports=n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e.exports.__esModule=!0,e.exports.default=e.exports,n(t)}e.exports=n,e.exports.__esModule=!0,e.exports.default=e.exports},5:function(e,t){e.exports=window.regeneratorRuntime},65:function(e,t){function n(t,r){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},e.exports.__esModule=!0,e.exports.default=e.exports,n(t,r)}e.exports=n,e.exports.__esModule=!0,e.exports.default=e.exports},8:function(e,t){e.exports=window.yoast.componentsNew},9:function(e,t){e.exports=window.yoast.styledComponents}});
>>>>>>> fb785cbb (Initial commit)
