var yengin = (function(o){return o((typeof window!=='undefined'?window:false),o.toString());})(function (_win,_source) {
	/*
	*	Yengin v2.1.4
	*	HTML5/Canvas and Components
	*	Library programmed by Yarflam
	*	Compatible on Firefox, Chrome, Edge, IE
	*		Can use it with Node.js
	*
	*	Creative Commons - BY:NC:SA - 2015-2017
	*
	*	> Modified on 20/04/2017 - Yarflam
	*/

	var self = {}, priv = {}, onlyWeb = [];
	self.mode = (_win ? 'web' : 'node.js');
	self.version = "2.1.4";

	/*
	*	Add shortcut for Windows Object
	*/

	self.support = function (obj, force) {
		obj = (self.isset(obj) ? obj : _win);
		force = (self.isset(force) ? force : false);
		if(!self.isset(obj.isSupported)) {
			if(self.isset(obj.$) && !force) {
				self.warning("Conflict with Jquery");
			} else { obj.$ = yengin; }
			obj.isSupported = true;
		}
		return yengin;
	}, onlyWeb.push('support');

	/*
	*	Warning Monitoring
	*/

	self.warning = function (msg) {
		console.warn(self.formatStr("Yengin [v.%s] : %s", [self.version, msg]));
	}, onlyWeb.push('warning');

	/*
	*	Basic methods
	*/

	self.end = function (table) {
		return (table.length ? table[table.length-1] : null);
	};

	self.ord = function (value) {
		return value.charCodeAt(0);
	};

	self.chr = function (value) {
		return String.fromCharCode(value);
	};

	self.ucfirst = function (str) {
		return str.substr(0,1).toUpperCase()+str.substr(1);
	};

	self.strRepeat = function (str, n) {
		return new Array(n+1).join(str);
	};

	self.leftPad = function (str, char) {
		if(str.length && str[0] == char) {
			return str.substr(1);
		} else { return str; }
	};

	self.rightPad = function (str, char) {
		if(str.length && str[str.length-1] == char) {
			return str.substr(0, str.length-1);
		} else { return str; }
	};

	self.getAllIndex = function (table) {
		var item, tableIndex=[];
		for(item in table) { tableIndex.push(item); }
		return tableIndex;
	};

	self.isset = function (obj) {
		return (obj !== undefined ? true : false);
	};

	self.type = function (obj, simple) {
		var regex, temp;
		if(self.isset(obj)) {
			if(self.isset(simple) && simple) {
				return (typeof obj);
			} else {
				if(obj.constructor.name == undefined) {
					regex = /function ([^(]+)\([^)]*\)[^{]*\{[^}]*\}/;
					temp = obj.constructor.toString().match(regex);
					if(temp == null) {
						regex = /\[object ([^\]]+)\]/;
						temp = obj.constructor.toString().match(regex); }
					obj.constructor.name = (temp != null ? temp[1] : 'Object');
				}
				return (obj.constructor.name);
			}
		} else { return false; }
	};

	self.istype = function (obj, type, simple) {
		if(self.isset(obj)) {
			if(self.isset(simple) && simple) {
				return (self.type(obj, simple) == type);
			} else {
				return (self.type(obj) == type);
			}
		} else { return false; }
	};

	self.getFctName = function (fct) {
		var raw = fct.toString();
		return raw.split(self.chr(32))[1];
	};

	/*
	*	Sort
	*/

	self.quickSortItem = function (table, fct) {
		var item, pivot, usePivot=false, output={}, left={}, right={};
		if(Object.keys(table).length === 0) { return table; }
		for(item in table) {
			if(!usePivot) {
				pivot = item;
				usePivot = true;
			} else {
				if(fct(table[pivot], table[item]) > 0) {
					left[item] = table[item];
				} else {
					right[item] = table[item];
				}
			}
		}
		/* Next Steps */
		left = self.quickSortItem(left,fct);
		right = self.quickSortItem(right,fct);
		/* Compile */
		for(item in left) { output[item] = left[item]; }
		output[pivot] = table[pivot];
		for(item in right) { output[item] = right[item]; }
		return output;
	};

	self.quickSortArray = function (table, fct) {
		var i, pivot=null, output=[], left=[], right=[];
		if(!table.length) { return table; }
		for(i=0; i < table.length; i++) {
			if(pivot === null) {
				pivot = i;
			} else {
				if(fct(table[pivot], table[i]) > 0) {
					left.push(table[i]);
				} else {
					right.push(table[i]);
				}
			}
		}
		/* Next Steps */
		left = self.quickSortArray(left,fct);
		right = self.quickSortArray(right,fct);
		/* Compile */
		return left.concat([table[pivot]],right);
	};

	/*
	*	Copy, Virtualize
	*/

	self.deepCopy = function (oldObj, newObj) {
		var property;
		if(self.isset(oldObj)) {
			if(self.istype(oldObj, "Object")) {
				var newObj = newObj || {};
				for(property in oldObj) {
					if(self.istype(oldObj[property], "Function")) {
						newObj[property] = oldObj[property];
					} else {
						newObj[property] = self.deepCopy(oldObj[property]);
					}
				}
			} else if(self.istype(oldObj, "Array")) {
				var newObj = newObj || [];
				for(property in oldObj) {
					if(self.istype(oldObj[property], "Function")) {
						newObj[property] = oldObj[property];
					} else {
						newObj[property] = self.deepCopy(oldObj[property]);
					}
				}
			} else { return oldObj; }
		} else { return oldObj; }
		return newObj;
	};

	self.shallowCopy = function (oldObj, newObj) {
		var property, newObj = newObj || {};
		for(property in oldObj) {
			if(self.istype(oldObj[property], "Function")) {
				newObj[property] = oldObj[property];
			}
		}
		return newObj;
	};

	/* Warning: Function not standardized */
	self.serialize = function (name, obj) {
		var tmp, property, output = new String();
		output += 'var '+name+' = (function () {\nvar self={};\n';
		for(property in obj) {
			if(self.istype(obj[property], 'Function')) {
				output += 'self.'+property+' = '+obj[property].toString()+';\n';
			} else {
				tmp = JSON.stringify(obj[property]);
				tmp = tmp.replace(/\\/g,'\\\\').replace(/"/g, '\\"');
				output += 'self.'+property+' = JSON.parse("'+tmp+'");\n';
			}
		}
		output += 'return self;\n})();\n';
		return output;
	};

	self.env = function (call, obj) {
		if(obj == undefined) { obj = {}; }
		obj.fct = new Function('return ('+call.toString()+').bind(this)();');
		try { return obj.fct(); } catch (e) { return null; }
	};

	/*
	*	External Request :: GET
	*	url: /?name1=value1&name2=value2
	*/

	self._GET = (function () {
		if(self.mode == 'node.js') { return {}; }
		var i, segm, params, data, index, obj = {},
			url = _win.location.href,
			focus = url.indexOf('?');
		if(focus >= 0) {
			segm = url.substring(focus+1);
			params = segm.split('&');
			for(var i=0; i < params.length; i++) {
				data = params[i],
				index = data.indexOf('=');
				if(index >= 0) {
					obj[data.substr(0,index)] = data.substr(index+1);
				}
			}
		}
		return obj;
	})(), onlyWeb.push('_GET');

	/*
	*	External Request :: TAG
	*	url: /#tag
	*/

	self._TAG = (function () {
		if(self.mode == 'node.js') { return {}; }
		var url = _win.location.href,
			focus = url.indexOf('#');
		return (focus >= 0 ? url.substring(focus+1) : "");
	})(), onlyWeb.push('_TAG');

	/*
	*	Storage
	*
	*	@call_memory: set(), get(), clear()
	*	@call_stack: push(), pop(), clear()
	*/
	priv._dataStore = {};
	self.store = function (base) {
		if(!self.isset(base)) { return false; }
		var obj = {};
		obj._base = base;
		/* Methods */
		obj.set = function (id, value) {
			if(!self.isset(priv._dataStore[this._base])) { priv._dataStore[this._base] = {}; }
			return (priv._dataStore[this._base][id] = value, this); };
		obj.get = function (id) {
			if(self.isset(priv._dataStore[this._base])) {
				if(self.isset(priv._dataStore[this._base][id])) {
					return priv._dataStore[this._base][id];
				} else { return false; }
			} else { return false; }};
		obj.clear = function () {
			if(self.isset(priv._dataStore[this._base])) {
				delete priv._dataStore[this._base];
			} return this; };
		return obj;
	};

	priv._dataStack = {};
	self.stack = function (base) {
		if(!self.isset(base)) { return false; }
		var obj = {};
		obj._base = base;
		/* Methods */
		obj.push = function (value) {
			if(!self.isset(priv._dataStack[this._base])) { priv._dataStack[this._base] = []; }
			return (priv._dataStack[this._base].push(value), priv._dataStack[this._base].length-1); };
		obj.pop = function () {
			if(self.isset(priv._dataStack[this._base])) {
				var id = priv._dataStack[this._base].length-1;
				if(id >= 0) {
					return priv._dataStack[this._base].pop();
				} else { return false; }
			} else { return false; }};
		obj.call = function (addr) {
			if(self.isset(priv._dataStack[this._base])) {
				if(self.isset(priv._dataStack[this._base][addr])) {
					return priv._dataStack[this._base][addr];
				} else { return false; }
			} else { return false; }};
		obj.clear = function () {
			if(self.isset(priv._dataStack[this._base])) {
				delete priv._dataStack[this._base];
			} return this; };
		return obj;
	};

	/*
	*	Storage
	*
	*	@call: set(), get(), remove(), clear()
	*/
	self.localStore = (function () {
		var obj = {};
		obj.set = function (id, value, life) {
			life = life || false;
			if(life) { localStorage.setItem(id, value); }
			else { sessionStorage.setItem(id, value); }
			return this; };
		obj.get = function (id, life) {
			life = life || false;
			return (life ? localStorage[id] : sessionStorage[id]); };
		obj.remove = function (id, life) {
			life = life || false;
			if(life) { localStorage.removeItem(id); }
			else { sessionStorage.removeItem(id); }
			return this; };
		obj.clear = function (life) {
			life = life || false;
			if(life) { localStorage.clear(); }
			else { sessionStorage.clear(); }
			return this; };
		return obj;
	})(), onlyWeb.push('localStore');

	/* Edit on 28/09/2017 */
	self.onMode = false;

	/*
	*	DOM Manager
	*
	*	@call: eq(), css(), html(), append(), parent()
	*/
	self.getObj = function (selector, autoSelect) {
		/* AutoSelect Mode */
		var autoSelect = (self.isset(autoSelect) && !autoSelect ? false : true);
		/* Use an object or select it */
		if(self.istype(selector, 'String')) {
			var obj = document.querySelectorAll(selector);
			obj._selector = selector;
		} else {
			var obj = self.toNodeList(selector);
			obj._selector = undefined;
		}
		/* Use object */
		obj.eq = function (id) {
			id = (self.isset(id) ? id : 0);
			if(self.isset(this[id])) {
				var obj = this[id];
				obj._legacy = self.shallowCopy(this, {});
			} else { return this; }
			/* Methods */
			obj.css = function (args, value) {
				if(self.isset(value)) {
					this.style[args] = value;
					return this;
				} else if(self.istype(args, "Object")) {
					for(var property in args) {
						this.css(property, args[property]); }
					return this;
				} else if(self.istype(args, "String")) {
					return this.style[args];
				}};
			obj.getReal = function (attrib) {
				var real = getComputedStyle(this, null);
				return (self.isset(real[attrib]) ? real[attrib] : false); };
			obj.getPosition = function () {
				var position = {};
				position.x = this.offsetLeft;
				position.y = this.offsetTop;
				return position; };
			obj.getClass = function () {
				if(this.className.length) {
					return this.className.split(self.chr(32));
				} else { return new Array(); }};
			obj.setClass = function (args) {
				if(self.istype(args, "Array")) {
					this.className = args.join(self.chr(32)); }
				return this; };
			obj.addClass = function (name) {
				var listClass = this.getClass(),
					position = listClass.indexOf(name);
				if(self.isset(name) && position < 0) {
					listClass.push(name);
					this.setClass(listClass); }
				return this; };
			obj.hasClass = function (name) {
				return (this.getClass().indexOf(name) >= 0); };
			obj.removeClass = function (name) {
				var listClass = this.getClass(),
					position = listClass.indexOf(name);
				if(self.isset(name) && position >= 0) {
					listClass.splice(position, 1);
					this.setClass(listClass); }
				return this; };
			obj.val = function (content) {
				if(self.isset(content)) {
					this.value = content;
					return this;
				} else {
					return this.value;
				}};
			obj.html = function (content) {
				if(self.isset(content)) {
					this.innerHTML = content;
					return this;
				} else {
					return this.innerHTML;
				}};
			obj.append = function (content) {
				if(self.isset(content)) {
					this.innerHTML += content;
				} return this; };
			obj.addChild = function (content) {
				if(self.isset(content)) {
					this.appendChild(content);
				} return this; };
			obj.child = function (selector, autoSelect) {
				var autoSelect = (self.isset(autoSelect) && !autoSelect ? false : true);
				if(self.isset(selector)) {
					var node = self.shallowCopy(this._legacy, this.querySelectorAll(selector));
					return (node.length == 1 && autoSelect ? node.eq(0) : node);
				} else {
					return self.shallowCopy(this._legacy, this.childNodes);
				}};
			obj.children = function (selector, autoSelect) {
				return obj.child(selector, autoSelect); };
			obj.attr = function (attrib, value) {
				if(self.isset(attrib)) {
					if(self.isset(value)) {
						this.setAttribute(attrib, value);
						return this;
					} else { return this.getAttribute(attrib); }
				} else { return this; }};
			obj.removeAttr = function (attrib) {
				return (obj.removeAttribute(attrib),this); };
			obj.data = function (attrib, value) {
				if(self.isset(attrib)) {
					if(self.isset(value)) {
						return this.attr('data-'+attrib, value);
					} else { return this.attr('data-'+attrib); }
				} else { return this; }};
			obj.parent = function (selector) {
				var listParent = [], nextParent = this.parentNode;
				while(nextParent !== null) {
					listParent.push(nextParent);
					var nextParent = nextParent.parentNode; }
				if(listParent.length) {
					if(self.isset(selector) && !isNaN(selector)) {
						if(((selector-1) > 0 && (selector-1) < listParent.length)) {
							return self.getObj(listParent[selector-1]); }
					} else if(self.isset(selector)) {
						var myParent, mySearch;
						for(var i=0; i < listParent.length; i++) {
							myParent = listParent[i];
							mySearch = myParent.parentNode.querySelectorAll(selector);
							if([].indexOf.call(mySearch, myParent)>=0) {
								// return self.shallowCopy(this._legacy, myParent);
								return self.getObj(myParent);
					}}} return self.getObj(listParent[0]);
				} else { return this; }};
			obj.index = function (group) {
				var i, siblings = (!self.isset(group) ? this.parentNode.children : self.getObj(group));
				for(i=0; i < siblings.length; i++) {
					if(siblings[i] == this) { return i; }}
				return false; };
			obj.next = function (group, ncount) {
				var index, siblings;
				if(self.isset(group)) {
					if(self.istype(group, 'String')) {
						index = this.index();
						siblings = self.getObj(this.parentNode.querySelectorAll(group));
						for(var i=0; i < siblings.length; i++) {
							if(siblings.eq(i).index() > index) { return siblings.eq(i); }}
						return this;
					} else if(self.istype(group, 'Number')) {
						while(group > 0) { obj = obj.next(); group--; } return obj;
					} else if(self.isset(ncount)) {
						while(ncount > 0) { obj = obj.next(group); ncount--; } return obj;
					}
				}
				index = this.index(group);
				siblings = self.getObj((!self.isset(group) ? this.parentNode.children : group));
				return ((index+1) < siblings.length ? siblings.eq(index+1) : this); };
			obj.previous = function (group, ncount) {
				var index, siblings;
				if(self.isset(group)) {
					if(self.istype(group, 'String')) {
						index = this.index();
						siblings = self.getObj(this.parentNode.querySelectorAll(group));
						for(var i=0; i < siblings.length; i++) {
							if(siblings.eq(i).index() < index) { return siblings.eq(i); }}
						return this;
					} else if(self.istype(group, 'Number')) {
						while(group > 0) { obj = obj.previous(); group--; } return obj;
					} else if(self.isset(ncount)) {
						while(ncount > 0) { obj = obj.previous(group); ncount--; } return obj;
					}
				}
				index = this.index(group);
				siblings = self.getObj((!self.isset(group) ? this.parentNode.children : group));
				return ((index-1) >= 0 ? siblings.eq(index-1) : this); };
			obj.remove = function () {
				this.parentNode.removeChild(this); };
			obj.fullscreen = function (fct) {
				if(this.requestFullscreen) {
					this.requestFullscreen();
					if(self.isset(fct)) { self.addEvent('fullscreenchange', document, function trigger () {
						if(!document.msFullscreenElement) { self.remEvent('fullscreenchange', document, trigger);fct(); }
					}, false); }
				} else if(this.msRequestFullscreen) {
					this.msRequestFullscreen();
					if(self.isset(fct)) { self.addEvent('MSFullscreenChange', document, function trigger () {
						if(!document.msFullscreenElement) { self.remEvent('MSFullscreenChange', document, trigger);fct(); }
					}, false); }
				} else if(this.mozRequestFullScreen) {
					this.mozRequestFullScreen();
					if(self.isset(fct)) { self.addEvent('mozfullscreenchange', document, function trigger () {
						if(!document.mozFullScreen) { self.remEvent('mozfullscreenchange', document, trigger);fct(); }
					}, false); }
				} else if(this.webkitRequestFullScreen) {
					this.webkitRequestFullScreen();
					if(self.isset(fct)) { self.addEvent('webkitfullscreenchange', document, function trigger () {
						if(!document.webkitIsFullScreen) { self.remEvent('webkitfullscreenchange', document, trigger);fct(); }
					}, false); }
				}};
			obj.on = function (evt, fct, useCapture) {
				return self.addEvent(evt, this, fct, useCapture); };
			obj.addEvent = function (evt, fct, useCapture) {
				return self.addEvent(evt, this, fct, useCapture); };
			obj.remEvent = function (evt, fct) {
				return self.remEvent(evt, this, fct); };
			obj.catchKeys = function (fct, mode) {
				return self.catchKeys(this, fct, mode); };
			obj.catchMouse = function (fct) {
				return self.catchMouse(this, fct); };
			obj.scrollTo = function (x,y) {
				if(x !== false) { this.scrollLeft = x; }
				if(y !== false) { this.scrollTop = y; }
				return this; };
			obj.getScrollTop = function () { return this.scrollTop; };
			obj.getScrollLeft = function () { return this.scrollLeft; };
			obj.exist = function (fct) { return (obj.fct=fct,obj.fct(),obj); };
			obj.noexist = function (fct) { return obj; };
			obj.isChecked = function () { return (self.isset(obj.checked) ? obj.checked : false); };
			obj.eq = function () { return this; };
			/* Events heritage */
			if(self.onMode) {
				var gen = function (attr) {
					if(!attr.indexOf('on')) {
						attr = attr.substr(2);
						if(['select','scroll','search','submit','focus'].indexOf(attr) < 0) {
							obj[attr] = function (fct, useCapture) {
								obj.addEvent(attr, fct, useCapture);
							}
						}
					}
				}; for(attr in obj) { gen(attr); }
			}
			return obj;
		};
		obj.css = function (args, value) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).css(args, value)); }
			if(self.istype(args, "Object") || self.isset(value)) {
				return this;
			} return handle; };
		obj.getReal = function (attrib) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).getReal(attrib)); }
			return handle; };
		obj.addClass = function (name) {
			for(var i=0; i < this.length; i++) {
				this.eq(i).addClass(name); }
			return this; };
		obj.removeClass = function (name) {
			for(var i=0; i < this.length; i++) {
				this.eq(i).removeClass(name); }
			return this; };
		obj.val = function (content) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).val(content)); }
			if(self.isset(content)) { return this; } else { return handle; }};
		obj.html = function (content) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).html(content)); }
			if(self.isset(content)) { return this; } else { return handle; }};
		obj.append = function (content) {
			if(self.isset(content)) {
				for(var i=0; i < this.length; i++) {
					this.eq(i).append(content); }
			} return this; };
		obj.attr = function (attrib, value) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).attr(attrib, value)); }
			if(self.isset(value)) { return this; } else { return handle; }};
		obj.removeAttr = function (attrib) {
			for(var i=0; i < this.length; i++) {
				this.eq(i).removeAttr(attrib);
			} return this; };
		obj.data = function (attrib, value) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).data(attrib, value)); }
			if(self.isset(value)) { return this; } else { return handle; }};
		obj.parent = function (selector) {
			return this.eq(0).parent(selector); };
		obj.remove = function () {
			for(var i=0; i < this.length; i++) {
				this.eq(i).remove(); }};
		obj.on = function (evt, fct, useCapture) {
			return self.addEvent(evt, this, fct, useCapture); };
		obj.addEvent = function (evt, fct, useCapture) {
			return self.addEvent(evt, this, fct, useCapture); };
		obj.remEvent = function (evt, fct) {
			return self.remEvent(evt, this, fct); };
		obj.scrollTo = function (x,y) {
			if(self.isset(x) && self.isset(y)) {
				for(var i=0; i < this.length; i++) {
					this.eq(i).scrollTo(x,y); }
			} return this; };
		obj.getScrollTop = function () {
			var i, handle = 0;
			for(i=0; i < this.length; i++) {
				handle = handle || this.eq(i).getScrollTop(); }
			return handle; };
		obj.getScrollLeft = function () {
			var i, handle = 0;
			for(i=0; i < this.length; i++) {
				handle = handle || this.eq(i).getScrollLeft(); }
			return handle; };
		obj.each = function (fct) {
			self.each(this, fct, true); };
		obj.exist = function (fct) {
			return (obj.length?(obj.fct=fct,obj.fct(),obj):obj); };
		obj.noexist = function (fct) {
			return (!obj.length?(fct(),obj):obj); };
		obj.isChecked = function (attrib) {
			var i, handle = [];
			for(i=0; i < this.length; i++) {
				handle.push(this.eq(i).isChecked(attrib)); }
			return handle; };
		/* Events heritage */
		if(self.onMode) {
			if(obj.length > 1 || (obj.length && !autoSelect)) {
				var gen = function (attr) {
					if(!attr.indexOf('on')) {
						attr = attr.substr(2);
						if(['select','scroll','search','submit','focus'].indexOf(attr) < 0) {
							obj[attr] = function (fct, useCapture) {
								obj.addEvent(attr, fct, useCapture);
							}
						}
					}
				}; for(attr in obj[0]) { gen(attr); }
			}
		}
		if(selector == obj) { return obj; }
		return (obj.length == 1 && autoSelect ? obj.eq() : obj);
	}, onlyWeb.push('getObj');

	self.getObjId = function (id) { return this.getObj("#"+id); }, onlyWeb.push('getObjId');
	self.getObjTag = function (id) { return this.getObj("."+id); }, onlyWeb.push('getObjTag');
	self.getNewObj = function (type) { return this.getObj(document.createElement(type)); }, onlyWeb.push('getNewObj');

	self.toNodeList = function (obj) {
		var nodeList;
		if(!obj.parentNode) {
			try {
				var _temp = document.createDocumentFragment();
				_temp.appendChild(obj);
				nodeList = _temp.childNodes;
			} catch (e) { return obj; }
		} else {
			obj.setAttribute('wrapNodeList','');
			nodeList = obj.parentNode.querySelectorAll('[wrapNodeList]');
			obj.removeAttribute('wrapNodeList');
		}
		return nodeList;
	}, onlyWeb.push('toNodeList');

	/*
	*	Loop Manager
	*/
	self.each = function (obj, fct, isObject) {
		for(var key in obj) {
			if(!isObject || self.istype(obj[key], 'object', true)) {
				if(isObject) { obj[key] = self.getObj(obj[key]); }
				if(fct.length == 1) {
					fct(obj[key]);
				} else if(fct.length == 2) {
					fct(key, obj[key]);
				}
			}
		}
	};

	/*
	*	JS Manager
	*
	*	@details: Import Script
	*/
	self.getJs = function (args, fct, waitAll) {
		var i;
		waitAll = (self.isset(waitAll) && waitAll ? true : false);
		args = (self.istype(args, "Array") ? args : [args]);
		if(waitAll) {
			var pProgress = 0,
				pFct = function () {
					if(pProgress < args.length-1) {
						pProgress++;
					} else if(fct) { fct(); }
				};
			/* Import Scripts */
			for(i=0; i < args.length; i++) {
				var obj = this.getNewObj('script');
				obj.type = "text/javascript";
				obj.src = args[i];
				obj.onload = pFct;
				this.getObj('head').addChild(obj);
			}
		} else {
			/* Import Scripts */
			for(i=0; i < args.length; i++) {
				var obj = this.getNewObj('script');
				obj.type = "text/javascript";
				obj.src = args[i];
				if(fct) { obj.onload = fct; }
				this.getObj('head').addChild(obj);
			}
		}
		return this;
	}, onlyWeb.push('getJs');

	/*
	*	CSS File Manager
	*/
	self.getCss = function (args, fct, waitAll) {
		var i;
		waitAll = (self.isset(waitAll) && waitAll ? true : false);
		args = (self.istype(args, "Array") ? args : [args]);
		if(waitAll) {
			var pProgress = 0,
				pFct = function () {
					if(pProgress < args.length-1) {
						pProgress++;
					} else if(fct) { fct(); }
				};
			/* Import Style */
			for(i=0; i < args.length; i++) {
				var obj = this.getNewObj('link');
				obj.rel = "stylesheet";
				obj.type = "text/css";
				obj.href = args[i];
				obj.onload = pFct;
				this.getObj('head').addChild(obj);
			}
		} else {
			/* Import Style */
			for(i=0; i < args.length; i++) {
				var obj = this.getNewObj('link');
				obj.rel = "stylesheet";
				obj.type = "text/css";
				obj.href = args[i];
				if(fct) { obj.onload = fct; }
				this.getObj('head').addChild(obj);
			}
		}
		return this;
	}, onlyWeb.push('getCss');

	/* Warning: Function not standardized */
	priv._dataGlobalCss = {'dom': false, 'list': {}};
	self.globalCss = function (selector) {
		var obj = {};
		obj._selector = selector;
		/* Define class */
		obj.use = function (args, value) {
			if(!yengin.isset(priv._dataGlobalCss.list[obj._selector])) {
				priv._dataGlobalCss.list[obj._selector] = {}; }
			if(self.isset(value)) {
				priv._dataGlobalCss.list[obj._selector][args] = value;
			} else if(self.istype(args, "Object")) {
				for(property in args) {
					priv._dataGlobalCss.list[obj._selector][property] = args[property]; }
			} else if(self.istype(args, "String")) {
				return priv._dataGlobalCss.list[obj._selector][args];
			} return obj;
		};
		/* General - build all */
		obj.refresh = function () {
			/* Create the style */
			if(!priv._dataGlobalCss.dom) {
				priv._dataGlobalCss.dom = self.getNewObj('style');
				priv._dataGlobalCss.dom.attr('type','text/css');
				yengin('head').eq(0).addChild(priv._dataGlobalCss.dom); }
			/* Create the output */
			var content = "";
			for(selector in priv._dataGlobalCss.list) {
				content += selector+"{";
				for(property in priv._dataGlobalCss.list[selector]) {
					content += property+":"+priv._dataGlobalCss.list[selector][property]+";";
				} content += "}";
			}
			priv._dataGlobalCss.dom.html(content);
		};
		return obj;
	}, onlyWeb.push('globalCss');

	/*
	*	JSON Manager
	*/
	self.jsonParse = function (content) {
		try { return JSON.parse(content);
		} catch(e) { return {}; }
	};

	/*
	*	Image Manager
	*/
	self.getImg = function (args, fct) {
		args = (self.istype(args, "Array") ? args : [args]);
		var i, pListImg = [],
			pProgress = 0,
			pFct = function () {
				pListImg.push(this);
				if(pProgress < args.length-1) {
					pProgress++;
				} else { fct(pListImg); }
			};
		/* Import Images */
		for(i=0; i < args.length; i++) {
			var obj = new Image();
			obj.src = args[i];
			if(fct) { obj.onload = pFct; }
		}
	}, onlyWeb.push('getImg');

	/*
	*	Events Manager
	*
	*	@details: New Event
	*/

	self.ready = function (fct) { return self.addEvent("load", _win, fct); }, onlyWeb.push('ready');

	self.addEvent = function (evt, obj, fct, useCapture) {
		var self = this;
		if(self.istype(obj, "NodeList")) {
			for(var i=0; i < obj.length; i++) {
				this.addEvent(evt, obj[i], fct, useCapture); }
		} else {
			/* Add event */
			if(obj.addEventListener) {
				obj.addEventListener(evt, fct, useCapture);
			} else if(obj.attachEvent) {
				obj.attachEvent("on"+evt, fct, useCapture);
			} else {
				obj[evt] = fct;
			}
		}
		return obj;
	}, onlyWeb.push('addEvent');

	self.remEvent = function (evt, obj, fct) {
		var self = this;
		if(self.istype(obj, "NodeList")) {
			for(var i=0; i < obj.length; i++) {
				this.remEvent(evt, obj[i], fct); }
		} else {
			/* Remove Event */
			if(obj.removeEventListener) {
				obj.removeEventListener(evt, fct);
			} else if(obj.detachEvent) {
				obj.detachEvent("on"+evt, fct);
			} else {
				obj[evt] = false;
			}
		}
		return obj;
	}, onlyWeb.push('remEvent');

	self.callEvent = function (evt, obj, data) {
		var handle = new CustomEvent(evt, {detail: data});
		obj.dispatchEvent(handle);
	}, onlyWeb.push('callEvent');

	self.simulateClick = function (obj) {
		var evt = document.createEvent("MouseEvents");
		evt.initEvent("click", true, true);
		obj.dispatchEvent(evt);
	}, onlyWeb.push('simulateClick');

	self.catchKeys = function (obj, fct, mode) {
		var evt = (mode == true ? 'keyup' : 'keydown');
		this.addEvent(evt, obj, function (e) {
			this.key = (e.keyCode ? e.keyCode : e.which);
			if(self.isset(fct)) {
				obj.fct = fct;
				var callback = obj.fct(this.key, e);
				if(callback == false) {
					self.stopEvent(e);
				}
			}
		});
		return obj;
	}, onlyWeb.push('catchKeys');

	self.catchMouse = function (obj, fct) {
		obj.lastMouse = {};
		obj.mouse = {'x': false, 'y': false};
		this.addEvent('mousemove', obj, function (e) {
			this.lastMouse = {'x': this.mouse.x, 'y': this.mouse.y};
			var frame = this.getBoundingClientRect();
			this.mouse.x = (self.isset(e.pageX) ? e.pageX : event.x)-this.scrollLeft-frame.left;
			this.mouse.y = (self.isset(e.pageY) ? e.pageY : event.y)-this.scrollTop-frame.top;
			if(self.isset(fct)) {
				obj.fct = fct;
				obj.fct(this.mouse);
			}
		});
		return obj;
	}, onlyWeb.push('catchMouse');

	self.catchDragScroll = function (obj, fct) {
		var self = this;
		if(!self.isset(obj.mouse)) { this.catchMouse(obj); }
		this.addEvent('mousedown', obj, function () {
			self.addEvent('mousemove', this, fct); });
		this.addEvent('mouseup', obj, function () {
			self.remEvent('mousemove', this, fct); });
		return obj;
	}, onlyWeb.push('catchDragScroll');

	self.wait = function (fct, timer, repeat) {
		if(self.isset(repeat) && repeat == true) {
			return _win.setInterval(fct, timer);
		} else {
			return _win.setTimeout(fct, timer);
		}
	}, onlyWeb.push('wait');
	self.stopWait = function (obj) { clearInterval(obj); }, onlyWeb.push('stopWait');

	self.stopEvent = function (e) { e.preventDefault(); }, onlyWeb.push('stopEvent');
	self.clearEvent = function (e) { e.stopPropagation(); }, onlyWeb.push('clearEvent');

	/*
	*	AJAX Manager
	*/
	self.ajax = function (args) {
		var xhr, url, queryData;
		/* Plugin */
		if(_win.XMLHttpRequest) {
			xhr = new _win.XMLHttpRequest(); } else {
			xhr = new ActiveXObject("Microsoft.XMLHTTP"); }
		this.addEvent('readystatechange', xhr, function () {
			if(xhr.readyState == 4) {
				if((xhr.status == 200)&&(args.success !== undefined)) {
					args.success(xhr.responseText);
				} else if(args.error !== undefined) {
					args.error(xhr.status, xhr.responseText);
				}
			}
		});
		/* Prepare */
		url = args.url;
		queryData = this.getObjURI(args.data);
		/* Send */
		if(args.method.toUpperCase() == "POST") {
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send(queryData);
		} else {
			url += (url.indexOf('?') >= 0 ? "&" : "?")+queryData;
			xhr.open("GET", url, true);
			xhr.send();
		}
		return xhr;
	}, onlyWeb.push('ajax');

	priv._listAjaxSync = [], priv._runAjax = false;
	self.ajaxSync = function (args) {
		if(self.isset(args)) { priv._listAjaxSync.push(args); }
		if(!priv._runAjax && priv._listAjaxSync.length) {
			priv._runAjax = true;
			var link = priv._listAjaxSync.pop(0),
				origin = {'success': link.success, 'error': link.error};
			link.success = (function (responseText) {
				if(self.isset(origin.success)) { origin.success(responseText); }
				priv._runAjax = false;
				self.ajaxSync();
			});
			link.error = (function (status, responseText) {
				if(self.isset(origin.error)) { origin.error(status, responseText); }
				priv._runAjax = false;
				self.ajaxSync();
			});
			self.ajax(link);
		}
	}, onlyWeb.push('ajaxSync');

	self.stopAjax = function (handle) { handle.abort(); }, onlyWeb.push('stopAjax');

	self.getObjURI = function (obj) {
		var attrib, URI = new String();
		for(attrib in obj) { URI += attrib+"="+encodeURIComponent(obj[attrib])+"&"; }
		return URI.substring(0, URI.length-1);
	};

	/*
	*	Canvas Manager
	*/
	self.canvas = function (selector) {
		var obj = this.getObj(selector);
		obj.ctx = obj.getContext('2d');
		obj.hashResize = 0;
		obj.factCtx = 0;
		obj.size = function (x, y) {
			this.css('width', x);this.css('height', y);
			return this; };
		obj.autoResize = function (fact) {
			obj.dpp('auto', 'auto', fact);
			self.addEvent('resize', _win, function () {
				obj.dpp('auto','auto', fact);
				obj.hashResize = self.getTime();
			}); };
		obj.catchResize = function (fct) {
			if(obj.hashResize >= self.getTime()-1000) {
				obj.hashResize = 0;
				fct(obj.getDpp());
			}};
		obj.dpp = function (x,y,fact) {
			obj.factCtx = fact;
			var ratio = (this.offsetHeight/this.offsetWidth);
			x = (x == 'auto' ? this.parentNode.offsetWidth : x);
			y = (y == 'auto' ? x*ratio : y);
			if(self.isset(fact)) {
				this.width = x*fact;this.height = y*fact;
			} else { this.width = x;this.height = y; }
			return this; };
		obj.getDpp = function () {
			return {'x': this.width, 'y': this.height}; };
		obj.getURI = function () {
			return this.toDataURL("image/png"); };
		/* Warning: Functions not standardized */
		obj.modeDraw = function () { obj.ctx.globalCompositeOperation = 'source-over'; };
		obj.modeClear = function () { obj.ctx.globalCompositeOperation = 'destination-out'; };
		/* End Warning */
		obj.drawCircle = function (args) {
			/*
			*	@args: x, y, radius, color, border, borderColor,
					shadow*, shadowColor*, startArc*, endArc*, mode
			*	@return: obj
			*/
			var startArc = (self.isset(args.startArc) ? args.startArc : 0),
				endArc = (self.isset(args.endArc) ? args.endArc : 2*Math.PI);
			obj.ctx.beginPath();
			obj.ctx.fillStyle = args.color;
			obj.ctx.lineWidth = args.border;
			obj.ctx.strokeStyle = args.borderColor;
			if(self.isset(args.shadow)) { obj.ctx.shadowBlur = args.shadow; }
			if(self.isset(args.shadowColor)) { obj.ctx.shadowColor = args.shadowColor; }
			obj.ctx.arc(args.x, args.y, args.radius, startArc, endArc, false);
			if(args.mode) { obj.ctx.fill(); } else { obj.ctx.stroke(); }
			obj.ctx.stroke();
			obj.ctx.closePath();
			return obj; };
		obj.drawRect = function (args) {
			/*
			*	@args: A (Array), B (Array), color, border, borderColor, mode
			*	@example(A|B): [0,0]
			*	@return: obj
			*/
			obj.ctx.beginPath();
			obj.ctx.fillStyle = args.color;
			obj.ctx.lineWidth = args.border;
			obj.ctx.strokeStyle = args.borderColor;
			obj.ctx.rect(args.A[0], args.A[1], args.B[0]-args.A[0], args.B[1]-args.A[1]);
			if(args.mode) { obj.ctx.fill(); } else { obj.ctx.stroke(); }
			obj.ctx.stroke();
			obj.ctx.closePath();
			return obj; };
		obj.drawRoundRect = function (args) {
			/*
			*	@args: A (Array), B (Array), color, border, borderColor, borderRadius, mode
			*	@example(A|B): [0,0]
			*	@return: obj
			*/
			var radius = args.borderRadius;
			obj.ctx.beginPath();
			obj.ctx.fillStyle = args.color;
			obj.ctx.lineWidth = args.border;
			obj.ctx.strokeStyle = args.borderColor;
			obj.ctx.moveTo(args.A[0]+radius, args.A[1]);
			obj.ctx.lineTo(args.B[0]-radius, args.A[1]);
			obj.ctx.quadraticCurveTo(args.B[0], args.A[1], args.B[0], args.A[1]+radius);
			obj.ctx.lineTo(args.B[0], args.B[1]-radius);
			obj.ctx.quadraticCurveTo(args.B[0], args.B[1], args.B[0]-radius, args.B[1]);
			obj.ctx.lineTo(args.A[0]+radius, args.B[1]);
			obj.ctx.quadraticCurveTo(args.A[0], args.B[1], args.A[0], args.B[1]-radius);
			obj.ctx.lineTo(args.A[0], args.A[1]+radius);
			obj.ctx.quadraticCurveTo(args.A[0], args.A[1], args.A[0]+radius, args.A[1]);
			if(args.mode) { obj.ctx.fill(); } else { obj.ctx.stroke(); }
			obj.ctx.stroke();
			obj.ctx.closePath();
			return obj; };
		obj.drawPolygon = function (args) {
			/*
			*	@args: data (Array), color, border, borderColor, mode
			*	@example(data): [[0,0], [5,0], [5,5]]
			*	@return: obj
			*/
			obj.ctx.beginPath();
			obj.ctx.fillStyle = args.color;
			obj.ctx.lineWidth = args.border;
			obj.ctx.strokeStyle = args.borderColor;
			obj.ctx.moveTo(args.data[0][0], args.data[0][1]);
			for(var i=1; i < args.data.length; i++) {
				obj.ctx.lineTo(args.data[i][0], args.data[i][1]); }
			if(args.mode) { obj.ctx.fill(); } else { obj.ctx.stroke(); }
			obj.ctx.stroke();
			obj.ctx.closePath();
			return obj; };
		obj.drawText = function (args) {
			/*
			*	@args: x, y, text, font, color
			*	@example(font): "normal 12pt Calibri"
			*	@return: obj
			*/
			obj.ctx.font = args.font;
			obj.ctx.fillStyle = args.color;
			obj.ctx.fillText(args.text, args.x, args.y);
			return obj; };
		obj.drawPixel = function (args) {
			/*
			*	@args: x, y, color, size
			*	@return: obj
			*/
			obj.ctx.fillStyle = args.color;
			obj.ctx.fillRect(args.x, args.y, args.size, args.size);
			return obj; };
		obj.drawImage = function (args) {
			/*
			*	@args: src, img(x, y, w, h), cvs(x, y, w, h)
			*	@return: obj
			*/
			var img = args.img, cvs = args.cvs;
			obj.ctx.drawImage(args.src,
				img.x, img.y, img.w, img.h,
				cvs.x, cvs.y, cvs.w, cvs.h );
			return obj; };
		obj.clear = function (args) {
			if(self.isset(args)) {
				obj.ctx.clearRect(args.A[0], args.A[1], args.B[0], args.B[1]);
			} else {
				obj.ctx.clearRect(0, 0, obj.width, obj.height);
			}
			return obj; };
		return obj;
	}, onlyWeb.push('canvas');

	/*
	*	Entity Component System
	*/
	self.ECS = function () {
		var obj = {};
		obj._components = {};
		/* Create a component - private method */
		var __createComponent__ = function (nameComponent) {
			if(!self.isset(obj._components[nameComponent])) {
				var component = {};
				component._name = nameComponent;
				component._entities = {};
				component._properties = [];
				component.count = function () {
					var nbEntities = 0;
					for(entity in component._entities) {
						nbEntities++; }
					return nbEntities; };
				component.addEntity = function (entity) {
					component._entities[entity()] = []; };
				component.addProperty = function (nameProperty) {
					component._properties.push(nameProperty); };
				obj._components[nameComponent] = component;
			}
		};
		/* Assign a component - private method  */
		var __getComponent__ = function (nameComponent) {
			if(!self.isset(obj._components[nameComponent])) {
				__createComponent__(nameComponent); }
			return obj._components[nameComponent];
		};
		/* Create an entity */
		obj.create = function () {
			var entity = {};
			entity._id = obj._components._list.count();
			entity.__build__ = function () {
				var clone = entity.getId;
				for(attr in entity) { clone[attr] = entity[attr]; }
				entity = clone; };
			entity.getId = function () { return entity._id; };
			entity.addComponent = function (nameComponent) {
				__getComponent__(nameComponent).addEntity(entity); };
			/* Build it */
			entity.__build__();
			/* Add the entity */
			obj._components._list.addEntity(entity);
			return entity;
		};
		/* Add a property on component */
		obj.addProperty = function (nameComponent, nameProperty) {
			__getComponent__(nameComponent).addProperty(nameProperty); };
		/* Create a basic component */
		__createComponent__('_list');
		return obj;
	};

	/*
	*	Cookies Manager
	*/
	self.cookie = function (cookieId) {
		var obj = {};
		obj._id = cookieId;
		obj._year = 365*24*60*60*1000;
		obj._domain = "/";
		obj.set = function (args) {
			/*
			*	Add or edit the cookie
			*	@args: value, expire, domain
			*/
			var now = new Date(),
				year = now.getTime()+this._year,
				expire = (!self.isset(args.expire) ? year : args.expire),
				domain = (!self.isset(args.domain) ? this._domain : args.domain),
				cookie = [];
			now.setTime(expire);
			cookie.push(this._id)
			cookie.push("="+args.value+";");
			cookie.push("expires="+now.toGMTString()+";");
			cookie.push("path="+domain);
			document.cookie = cookie.join('');
			return this; };
		obj.get = function () {
			/* Return the value of cookie */
			var item, cookie, myCook = false,
				listCook = document.cookie.split(';');
			for(item in listCook) {
				cookie = listCook[item].split('=');
				if(cookie[0].replace(/ /g,'') == this._id) {
					myCook = cookie[1];
				}
			}
			return myCook; };
		obj.remove = function () {
			/* Delete the cookie */
			this.set({'value': null, 'expire': -1});
			return this; };
		return obj;
	}, onlyWeb.push('cookie');

	/*
	*	Promises / Coroutines
	*/

	/*
	*	Extrapolations, vectors, matrix
	*/
	self.vector2D = function (a, b) {
		var obj = {};
		obj._a = a;
		obj._b = b;
		obj.getLength = function () {
			var lenX = Math.pow(this._b[0]-this._a[0], 2),
				lenY = Math.pow(this._b[1]-this._a[1], 2);
			return Math.sqrt(lenX+lenY); };
		obj.getNorm = function () {
			var vectLength = this.getLength();
			if(vectLength) {
				return [
					(this._b[0]-this._a[0])/vectLength,
					(this._b[1]-this._a[1])/vectLength ]
			} else { return [0, 0]; }
		};
		return obj;
	};

	self.toRadian = function (angle) {
		return (angle-180)/(180/Math.PI); };
	self.toAngle = function (angle) {
		return (angle*(180/Math.PI))+180; };
	self.toCartesien = function (angle) {
		var rad = self.toRadian(angle);
		return [Math.cos(rad), Math.sin(rad)]; };
	self.toPolaire = function (x, y) {
		var x = self.toAngle(Math.acos(x)),
			y = self.toAngle(Math.asin(y));
		return (Math.floor(y) >= 180 ? (x%360) : (360-x)); };

	/*
	*	Complex Numbers
	*	@args: r(eal), i(maginary)
	*/
	self.complex = function (r, i) {
		var obj = function () {
			return (
				(obj._r&&obj._i)
				?obj._r+(obj._i>=0?' + ':' - ')+Math.abs(obj._i)+'i'
				:(obj._r?obj._r:(obj._i?obj._i+'i':0))
			);
		};
		/* Variables */
		(obj._r = r||0, obj._i = i||0);
		/* Operators */
		obj.neg = (function () {
			return self.complex(-obj._r, -obj._i);});
		obj.add = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			return self.complex(obj._r+b._r, obj._i+b._i);});
		obj.sub = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			return self.complex(obj._r-b._r, obj._i-b._i);});
		obj.mul = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			return self.complex(
				(obj._r*b._r-obj._i*b._i),
				(obj._r*b._i+obj._i*b._r)
			);});
		obj.div = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			return self.complex(
				(obj._r*b._r+obj._i*b._i)/(b._r*b._r+b._i*b._i),
				(obj._i*b._r-obj._r*b._i)/(b._r*b._r+b._i*b._i)
			);});
		obj.pow = (function (b) {
			if(obj.isComplex(b||0)) {
				return self.complex(
					Math.pow(obj._r,b._r)*Math.cos(b._i*Math.log(obj._r)),
					Math.pow(obj._r,b._r)*Math.sin(b._i*Math.log(obj._r))
				);
			} else if(!b || b == 1) {
				return self.complex(obj._r/(!b ? obj._r||1 : 1), obj._i/(!b ? obj._i||1 : 1));
			} else {
				return self.complex(
					(Math.pow(obj._r, b)-Math.pow(obj._i, b)),
					(obj._r*Math.pow(obj._i, b-1)+obj._i*Math.pow(obj._r, b-1))
				);
			}});
		obj.mod = (function (b) {
			if(obj.isComplex(b||0)) {
				return self.complex(obj._r % b._r, obj._i % b._i);
			} else {
				return self.complex(obj._r % b, obj._i % b);
			}
		});
		/* Methods */
		obj.dist = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			return Math.sqrt(Math.pow(b._r-obj._r,2)+Math.pow(b._i-obj._i,2)); });
		obj.getNorm = (function (b,i) {
			if(!obj.isComplex(b||0)) { b = self.complex(b||0, i||0); }
			var vLen = obj.dist(b);
			return (vLen?self.complex((obj._r-b._r)/vLen,(obj._i-b._i)/vLen):self.complex()); });
		obj.getAngle = (function () {
			var x, y, rad = (180/Math.PI), norm = obj.getNorm();
			x = (Math.acos(norm._r)*rad)+180;
			y = (Math.asin(norm._i)*rad)+180;
			return (Math.floor(y)<180?(x%360):(360-x)); });
		obj.zeta = (function (imax) {
			var p = self.complex(), one = self.complex(1), log = [];
			for(var i=0; i<imax; i++) {
				(log.push(p), p = p.add(one.div(self.complex(i+1).pow(obj)))); }
			return (p.log=log, p); });
		obj.isComplex = (function (b) {
			return (b.constructor.name == "Complex"); });
		/* Signature */
		obj.constructor = {"name": "Complex"};
		return obj;
	};

	/*
	*	Quaternions
	*	@args: w, i, j, k
	*/
	self.quaternion = function (w,i,j,k) {
		var obj = function () {
			return (
				obj._w+
				(obj._i >=0 ? ' + ' : ' - ')+Math.abs(obj._i)+'i'+
				(obj._j >=0 ? ' + ' : ' - ')+Math.abs(obj._j)+'j'+
				(obj._k >=0 ? ' + ' : ' - ')+Math.abs(obj._k)+'k'
			);
		};
		/* Variables */
		(obj._w = w||0, obj._i = i||0);
		(obj._j = j||0, obj._k = k||0);
		/* Operators */
		obj.neg = (function () {
			return self.quaternion(-obj._w, -obj._i, -obj._j, -obj._k);});
		obj.add = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			return self.quaternion(
				obj._w+b._w, obj._i+b._i,
				obj._j+b._j, obj._k+b._k
			);});
		obj.sub = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			return self.quaternion(
				obj._w-b._w, obj._i-b._i,
				obj._j-b._j, obj._k-b._k
			);});
		obj.mul = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			return self.quaternion(
				obj._w*b._w - obj._i*b._i - obj._j*b._j - obj._k*b._k,
				obj._i*b._w + obj._w*b._i + obj._k*b._j - obj._j*b._k,
				obj._j*b._w - obj._k*b._i + obj._w*b._j + obj._i*b._k,
				obj._k*b._w + obj._j*b._i - obj._i*b._j + obj._w*b._k
			);});
		obj.div = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			var temp = b._w*b._w + b._i*b._i + b._j*b._j + b._k*b._k;
			return self.quaternion(
				(obj._w*b._w + obj._i*b._i + obj._j*b._j + obj._k*b._k) / temp,
				(obj._i*b._w - obj._w*b._i - obj._k*b._j + obj._j*b._k) / temp,
				(obj._j*b._w + obj._k*b._i - obj._w*b._j - obj._i*b._k) / temp,
				(obj._k*b._w - obj._j*b._i + obj._i*b._j - obj._w*b._k) / temp
			);});
		obj.pow = (function (b) {
			if(obj.isQuaternion(b||0)) {
				/* In Working */
				return obj;
			} else if(!b || b == 1) {
				return self.quaternion(
					obj._w/(!b ? obj._w||1 : 1), obj._i/(!b ? obj._i||1 : 1),
					obj._j/(!b ? obj._j||1 : 1), obj._k/(!b ? obj._k||1 : 1)
				);
			} else {
				return self.quaternion(
					Math.pow(obj._w,b-1) - Math.pow(obj._i,b-1) - Math.pow(obj._j,b-1) - Math.pow(obj._k,b-1),
					obj._i*Math.pow(obj._w,b-2) + obj._w*Math.pow(obj._i,b-2) + obj._k*Math.pow(obj._j,b-2) - obj._j*Math.pow(obj._k,b-2),
					obj._j*Math.pow(obj._w,b-2) - obj._k*Math.pow(obj._i,b-2) + obj._w*Math.pow(obj._j,b-2) + obj._i*Math.pow(obj._k,b-2),
					obj._k*Math.pow(obj._w,b-2) + obj._j*Math.pow(obj._i,b-2) - obj._i*Math.pow(obj._j,b-2) + obj._w*Math.pow(obj._k,b-2)
				);
			}
		});
		obj.mod = (function (b) {
			if(obj.isQuaternion(b||0)) {
				return self.quaternion(
					obj._w % b._w, obj._i % b._i,
					obj._j % b._j, obj._k % b._k
				);
			} else {
				return self.quaternion(
					obj._w % b, obj._i % b,
					obj._j % b, obj._k % b
				);
			}
		});
		/* Methods */
		obj.conjugate = (function () {
			return self.quaternion(obj._w, -obj._i, -obj._j, -obj._k);});
		obj.dist = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			return Math.sqrt(
				Math.pow(b._w-obj._w,2) + Math.pow(b._i-obj._i,2) +
				Math.pow(b._j-obj._j,2) + Math.pow(b._k-obj._k,2)
			);});
		obj.getNorm = (function (b,i,j,k) {
			if(!obj.isQuaternion(b||0)) { b = self.quaternion(b||0, i||0, j||0, k||0); }
			var vLen = obj.dist(b);
			return (vLen ? self.quaternion(
					(obj._w-b._w)/vLen, (obj._i-b._i)/vLen,
					(obj._j-b._j)/vLen, (obj._k-b._k)/vLen
				) : self.quaternion()
			);});
		obj.getAngle = (function () {
			/* Roll(b): X-axis, Pitch(h): Y-axis, Yaw(a): Z-axis */
			var rad = (180/Math.PI),
				roll, pitch, yaw, except,
				aRoll, bRoll, aPitch, bPitch, aYaw, bYaw;
			/* Matrix */
			aRoll = (2 * obj._i * obj._w) - (2 * obj._j * obj._k);
			bRoll = 1 - (2 * obj._i * obj._i) - (2 * obj._k * obj._k);
			aPitch = (2 * obj._j * obj._w) - (2 * obj._i * obj._k);
			bPitch = 1 - (2 * obj._j * obj._j) - (2 * obj._k * obj._k);
			aYaw = (obj._i * obj._j) + (obj._k * obj._w);
			bYaw = (obj._w * obj._w) + (obj._i * obj._i) + (obj._j * obj._j) + (obj._k * obj._k);
			/* Euler Angle */
			roll = Math.atan2(aRoll, bRoll);
			pitch = Math.atan2(aPitch, bPitch);
			yaw = Math.asin(2*aYaw/(bYaw||1));
			/* Exception */
			if(aYaw >= 0.5 || aYaw <= -0.5) {
				(roll = 0, yaw = (aYaw ? 1 : -1) * Math.PI/2);
				(pitch = 2 * (aYaw ? 1 : -1) * Math.atan2(obj._i, obj._w)); }
			/* Output */
			return [((roll*rad)+180)%360, ((pitch*rad)+180)%360, ((yaw*rad)+180)%360]; });
		obj.setAngle = (function (roll, pitch, yaw) {
			/* Roll(b): X-axis, Pitch(h): Y-axis, Yaw(a): Z-axis */
			var rad = (180/Math.PI),
				cPitch, cYaw, cRoll, sPitch, sYaw, sRoll;
			/* Radian */
			roll = (roll-180)/rad;
			pitch = (pitch-180)/rad;
			yaw = (yaw-180)/rad;
			/* Cosinus */
			cRoll = Math.cos(roll/2);
			cPitch = Math.cos(pitch/2);
			cYaw = Math.cos(yaw/2);
			/* Sinus */
			sRoll = Math.sin(roll/2);
			sPitch = Math.sin(pitch/2);
			sYaw = Math.sin(yaw/2);
			/* Quaternion */
			return self.quaternion(
				(cRoll * cPitch * cYaw) - (sRoll * sPitch * sYaw),
				(cRoll * sPitch * sYaw) + (sRoll * cPitch * cYaw),
				(cRoll * sPitch * cYaw) + (sRoll * cPitch * sYaw),
				(cRoll * cPitch * sYaw) - (sRoll * sPitch * cYaw)
			);});
		obj.zeta = (function () {
			/* In Working */
		});
		obj.isQuaternion = (function (b) {
			return (b.constructor.name == "Quaternion"); });
		/* Signature */
		obj.constructor = {"name": "Quaternion"};
		return obj;
	};

	/*
	*	Generator
	*/

	self.jsonToXHTML = function (content, tab, callObj, no_ln) {
		var i, markup, xhtml = new String(),
			tab = tab || 0,
			no_ln = no_ln || 0,
			mtab = (no_ln ? "" : self.strRepeat("\t", tab)),
			ln = (no_ln ? "" : "\n");
		/* Component */
		var getAttrib = function (content) {
			var xhtml = new String();
			for(attrib in content) {
				xhtml += self.chr(32);
				if(String(content[attrib]).length) {
					xhtml += attrib+"=\""+content[attrib]+"\"";
				} else { xhtml += attrib; }
			}
			return xhtml;};
		/* Loop */
		for(i=0; i < content.length; i++) {
			markup = content[i];
			switch(markup.model) {
				case 0:
					/* Simple Tag */
					xhtml += mtab+"<"+markup.name+
						getAttrib(markup.attrib)+">"+ln;
					if(self.isset(markup.children)) {
						xhtml += self.jsonToXHTML(markup.children, tab+1, false, no_ln); }
					xhtml += mtab+"</"+markup.name+">"+ln;
					break;
				case 1:
					/* Self-Closing Tag */
					xhtml += mtab+"<"+markup.name+
						getAttrib(markup.attrib)+"/>"+ln;
					break;
				case 2:
					/* PHP's Headers */
					xhtml += mtab+"<?"+markup.name+ln;
					if(self.isset(markup.children)) {
						xhtml += self.jsonToXHTML(markup.children, tab+1, false, no_ln); }
					xhtml += mtab+"?>\n";
					break;
				case 3:
					/* XML's Headers */
					xhtml += mtab+"<!"+markup.name+
						getAttrib(markup.attrib)+">"+ln;
					break;
				case 4:
					/* Simple Text */
					xhtml += mtab+String(markup.content).replace(/\n/g,"\n"+mtab)+ln;
					break;
			}
		}
		return (self.isset(callObj) && callObj ?
			self.getObj(self.getNewObj('div').html(xhtml).children[0]):xhtml);
	};

	/*
	*	Color
	*/

	self.decToHexColor = function (table, markCSS) {
		var i, hex, hexColor = (markCSS !== false ? "#" : "");
		for(i=0; i < table.length && i < 3; i++) {
			hex = table[i].toString(16).toUpperCase();
			hexColor += (hex.length == 2 ? "" : "0")+hex; }
		return hexColor;
	};

	self.divideColor = function (dust) {
		var i, handle = [],
			table = this.randIntTable(3, 0, 256);
		for(i=0; i < 3; i++) {
			handle[i] = (table[i] < dust ? table[i] : dust);
			dust -= handle[i]; }
		return handle;
	};

	/* RVB/RGB to TSL/HSL - Hue Saturation Lightness */
	self.rgbToHsl = function (table) {
		var hsl = {'h':0, 's':0, 'l':0},
			rgb = {};
		/* Parameters */
		rgb.r = table[0]/255;
		rgb.g = table[1]/255;
		rgb.b = table[2]/255;
		/* Properties */
		hsl.min = Math.min(rgb.r, rgb.g, rgb.b);
		hsl.max = Math.max(rgb.r, rgb.g, rgb.b);
		/* Lightness */
		hsl.d = hsl.max-hsl.min;
		hsl.l = (hsl.max+hsl.min)/2;
		/* Hue / Saturation */
		if(hsl.d) {
			hsl.s = (hsl.l>0.5?hsl.d/(2-hsl.max-hsl.min):hsl.d/(hsl.max+hsl.min));
			hsl.h = (hsl.max==rgb.r?(rgb.g-rgb.b)/hsl.d+(rgb.g<rgb.b?6:0):hsl.h);
			hsl.h = (hsl.max==rgb.g?(rgb.b-rgb.r)/hsl.d+2:hsl.h);
			hsl.h = (hsl.max==rgb.b?(rgb.r-rgb.g)/hsl.d+4:hsl.h);
			hsl.h /= 6; }
		return [
			hsl.h, hsl.s, hsl.l
		];
	};

	self.hslToRgb = function (table) {
		var rgb = {'r':0, 'g':0, 'b':0},
			hsl = {};
		/* Parameters */
		hsl.h = table[0];
		hsl.s = table[1];
		hsl.l = table[2];
		/* Prepare */
		hsl.a = (hsl.l<0.5?hsl.l*(1+hsl.s):hsl.l+hsl.s-hsl.l*hsl.s);
		hsl.b = 2*hsl.l-hsl.a;
		hsl.c = (hsl.h+1/3);hsl.c+=(hsl.c<0?1:(hsl.c>1?-1:0));
		hsl.d = (hsl.h-1/3);hsl.d+=(hsl.d<0?1:(hsl.d>1?-1:0));
		hsl.e = hsl.h+(hsl.h<0?1:(hsl.h>1?-1:0));
		hsl.f = (hsl.a-hsl.b)*6;
		/* Operation */
		if(hsl.s) {
			hsl.ced = [2,0,0,3,1,1,1];
			rgb.r=[hsl.a,hsl.b,hsl.b+hsl.f*hsl.c,hsl.b+hsl.f*(2/3-hsl.c)][hsl.ced[(hsl.c*6>>0)%7]];
			rgb.g=[hsl.a,hsl.b,hsl.b+hsl.f*hsl.e,hsl.b+hsl.f*(2/3-hsl.e)][hsl.ced[(hsl.e*6>>0)%7]];
			rgb.b=[hsl.a,hsl.b,hsl.b+hsl.f*hsl.d,hsl.b+hsl.f*(2/3-hsl.d)][hsl.ced[(hsl.d*6>>0)%7]];
		} else { rgb.r = rgb.g = rgb.b = hsl.l; }
		return [
			Math.round(rgb.r*255), Math.round(rgb.g*255), Math.round(rgb.b*255)
		];
	};

	/* RVB/RGB to TSV/HSV/HSB - Hue Saturation Value */
	self.rgbToHsv = function (table) {
		var hsv = {'h':0, 's':0, 'v':0},
			rgb = {};
		/* Parameters */
		rgb.r = table[0]/255;
		rgb.g = table[1]/255;
		rgb.b = table[2]/255;
		/* Properties */
		hsv.min = Math.min(rgb.r, rgb.g, rgb.b);
		hsv.max = Math.max(rgb.r, rgb.g, rgb.b);
		/* Saturation / Value */
		hsv.v = hsv.max;
		hsv.d = hsv.max-hsv.min;
		hsv.s = (hsv.max ? hsv.d/hsv.max : 0);
		/* Hue */
		if(hsv.d) {
			hsv.h = (hsv.max==rgb.r?(rgb.g-rgb.b)/hsv.d+(rgb.g<rgb.b?6:0):hsv.h);
			hsv.h = (hsv.max==rgb.g?(rgb.b-rgb.r)/hsv.d+2:hsv.h);
			hsv.h = (hsv.max==rgb.b?(rgb.r-rgb.g)/hsv.d+4:hsv.h);
			hsv.h /= 6; }
		return [
			hsv.h, hsv.s, hsv.v
		];
	};

	self.hsvToRgb = function (table) {
		var rgb = {'r':0, 'g':0, 'b':0},
			hsv = {};
		/* Parameters */
		hsv.h = table[0];
		hsv.s = table[1];
		hsv.v = table[2];
		/* Prepare */
		hsv.a = Math.floor(hsv.h*6);
		hsv.b = hsv.h*6-hsv.a;
		hsv.c = hsv.v*(1-hsv.s);
		hsv.d = hsv.v*(1-hsv.b*hsv.s);
		hsv.e = hsv.v*(1-(1-hsv.b)*hsv.s);
		/* Operation */
		hsv.r = [hsv.v,hsv.d,hsv.c,hsv.c,hsv.e,hsv.v][hsv.a%6];
		hsv.g = [hsv.e,hsv.v,hsv.v,hsv.d,hsv.c,hsv.c][hsv.a%6];
		hsv.b = [hsv.c,hsv.c,hsv.e,hsv.v,hsv.v,hsv.d][hsv.a%6];
		return [
			Math.round(hsv.r*255), Math.round(hsv.g*255), Math.round(hsv.b*255)
		];
	};

	/* RVB/RGB to CMJN/CMYK - Cyan Magenta Yellow Key */
	self.rgbToCmyk = function (table) {
		var cmyk = {'c':0, 'm':0, 'y':0, 'k':1};
		if(table[0] || table[1] || table[2]) {
			/* First Operation */
			cmyk.c = 1-(table[0]/255);
			cmyk.m = 1-(table[1]/255);
			cmyk.y = 1-(table[2]/255);
			cmyk.k = Math.min(cmyk.c, cmyk.m, cmyk.y);
			/* Second Operation */
			cmyk.c = (cmyk.c-cmyk.k)/(1-cmyk.k);
			cmyk.m = (cmyk.m-cmyk.k)/(1-cmyk.k);
			cmyk.y = (cmyk.y-cmyk.k)/(1-cmyk.k); }
		return [
			Math.round(cmyk.c*100), Math.round(cmyk.m*100),
			Math.round(cmyk.y*100), Math.round(cmyk.k*100)
		];
	};

	self.cmykToRgb = function (table) {
		var rgb = {'r':0, 'g':0, 'b':0},
			cmyk = {};
		/* Parameters */
		cmyk.c = table[0]/100;cmyk.m = table[1]/100;
		cmyk.y = table[2]/100;cmyk.k = table[3]/100;
		/* Operation */
		rgb.r = 1-Math.min(1, cmyk.c*(1-cmyk.k)+cmyk.k);
		rgb.g = 1-Math.min(1, cmyk.m*(1-cmyk.k)+cmyk.k);
		rgb.b = 1-Math.min(1, cmyk.y*(1-cmyk.k)+cmyk.k);
		return [
			Math.round(rgb.r*255), Math.round(rgb.g*255), Math.round(rgb.b*255)
		];
	};

	/*
	*	Base64
	*/

	priv.b64alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";

	self.b64encode = function (c) {
		var o,r,a,l,i,t;
		for((a=priv.b64alpha,o="",r=0,i=0);
			((l=c.charCodeAt(i),l>=0)
			||(l=0,c[i-1]&&(i%3))
			||(a="=",r=l=0,(o.length%4)));
			(!(i%3)&&c[i-1]?(o+=a[r],r=0):1)
		){ (t=((i%3)+1)*2,o+=a[r+(l>>t)],r=(l-((l>>t)<<t))<<(6-t),i++); }
		return o;
	};

	self.b64decode = function (c) {
		var o,r,a,l,i,t;
		for((a=priv.b64alpha,o="",r=0,i=0);(l=a.indexOf(c[i]),l>=0);i++
		){ (t=(6-((i%4)*2))%6,((i%4)?(o+=String.fromCharCode(r+(l>>t)),r=(l-((l>>t)<<t))<<(8-t)):r=l<<2)); }
		return o;
	};

	/*
	*	Format
	*/

	self.formatStr = function (str, array) {
		var regex, search, nchar=0;
		regex = new RegExp('({([0-9]*)}|%s)');
		while((search=regex.exec(str), search)) {
			search[2] = (search[2] != undefined ? search[2] : '');
			if(search[2].length && search[2] < array.length) {
				str = str.replace(search[0], array[search[2]]);
			} else if(!search[2].length && nchar < array.length) {
				str = str.replace(search[0], array[nchar]);
				++nchar;
			} else { str = str.replace(search[0], ''); }
		}
		return str;
	};

	self.toHex = function (number) {
		return number.toString(16).toUpperCase();
	};

	/*
	*	Tools
	*/

	self.subcount = function (needle, haystack) {
		var index=0, ncount=0;
		while((index=haystack.indexOf(needle, index), index) >= 0) {
			++index;++ncount; }
		return ncount;
	};

	self.isIn = function (needle, haystack) {
		if(self.istype(needle, 'Array')) {
			var i, test = true;
			for(i=0; i < needle.length; i++) {
				test = (haystack.indexOf(needle[i]) >= 0 ? test : false); }
			return test;
		} else { return (haystack.indexOf(needle) >= 0); }
	};

	self.mod = function (a,b) { while(a < 0) { a += b; } return (a % b); };
	self.modInv = function (a,b,deep) {
		var c = {x: 0, y: 1};
		if(a % b) {
			c = self.modInv(b, (a % b), true);
			c = {x: c.y, y: c.x-c.y*Math.floor(a/b)}; }
		return (self.isset(deep) ? c : c.x);
	};

	self.pgcd = function (a,b) {
		var c={x:a, y:b};
		while(c.x%c.y) { c={x:c.y, y:c.x%c.y}; }
		return c.y;
	};

	self.getTime = function () { var d = new Date();return d.getTime(); };

	self.rand = function (a,b) { return Math.random()*(b-a)+a; };
	self.randInt = function (a,b) { return Math.floor(Math.random()*(b-a))+a; };
	self.randIntTable = function (n,a,b) {
		var i, table = [];
		for(i=0; i < n; i++) {
			table.push(this.randInt(a,b)); }
		return table;
	};

	self.randPrim = function (a,b) {};

	self.newDoubleArray = function (x,y) {
		var i, table = new Array(x);
		for(i=0; i < x; i++) {
			table[i] = new Array(y); }
		return table;
	};

	self.decodeUrl = function (url) {
		var regex, match;
		regex = '^((([A-Za-z]+):)?//((([^:.]+)\\.){0,2})([^:/]+)(:([0-9]+))?';
		regex+= '(/([^/?.]+/)*))([^?]+)?(\\?([^#]+))?(#.+)?$';
		match = self.preg_match_all(regex, url);
		return (match.length ? match[0][1] : null);
	};

	self.preg_match_all = function (regex, content) {
		var match, output=[], pattern = new RegExp(regex,'g');
		while((match=pattern.exec(content),match!==null)) {
			output.push(match); }
		return output;
	};

	/*
	*	Use Node.js on Web - Emulation
	*	Warning: Function not standardized
	*/

	self.useNodejs = function (obj) {
		/* Properties */
		var _http = self.decodeUrl(_win.location.href),
			_folder = 'node_modules/',
			_package = 'package.json';
		/* Plugs */
		var getPackageJson = (function (module, callback) {
			var src = _http+_folder+module+'/';
			self.ajaxSync({
				'url': src+_package,
				'method': 'GET',
				'success': function (data) {
					var json = self.jsonParse(data);
					json._yenginModule = module;
					json._yenginPath = src;
					callback(json); },
				'error': function (e) { callback({}); }
			});
		});
		var getScript = (function (package, callback) {
			var src = package._yenginPath+package.main;
			self.ajaxSync({
				'url': src,
				'method': 'GET',
				'success': function (data) { callback(package, data); },
				'error': function (e) { callback(package, null); }
			});
		});
		/* Require Module */
		_win.module = {};
		_win.exports = {};
		_win.require = (function (module) {
			var app = {};
			app.threads = 0;
			app.modules = {};
			app.listIndexModules = [];
			app.lsDependances = (function (json) {
				app.threads--;
				if(self.isset(json._yenginModule)) {
					app.modules[json._yenginModule] = json;
					if(self.isset(json.dependencies)) {
						for(var item in json.dependencies) {
							app.getDependances(item);
						}
					}
				}
				if(!app.threads) { app.getAllModules(); }
			});
			app.getDependances = (function (module) {
				if(app.listIndexModules.indexOf(module) < 0) {
					app.threads++;
					app.modules[module] = {};
					app.listIndexModules.push(module);
					getPackageJson(module, app.lsDependances);
				}
			});
			app.useScript = (function (scriptPath, data) {
				// _win.require = function (module) {};
				// var script = $.getNewObj('script');
				// script.attr('type', 'text/javascript');
				// script.html(data);
				// $('head').addChild(script);
				var fct, pack;
				pack = 'var yengin = '+_source+';';
				console.log(pack);
				pack += ' yengin.useNodejs(); (function () {'+data+'})(); return exports; ';
				fct = new Function(pack);
				fct();
			});
			app.getAllModules = (function () {
				var i, package;
				for(i=0; i < app.listIndexModules.length; i++) {
					package = app.modules[app.listIndexModules[app.listIndexModules.length-i-1]];
					if(self.isset(package.main)) {
						if(self.end(package.main.split('.')) != 'js') {
							package.main += '.js'; }
						getScript(package, app.useScript);
					}
				}
			});
			app.getDependances(module);
		});
		return (self.isset(obj) ? (obj(),self) : self);
	}, onlyWeb.push('useNodejs');

	/* Export */
	return (function () {
		if(self.mode == 'node.js') {
			/* Node.js */
			var item;
			while((item=onlyWeb.pop(),item)) { delete self[item]; }
			return (module.exports = self, self);
		} else {
			/* Navigator */
			var item, obj = self.getObj;
			for(item in self) {
				obj[item] = self[item];
			} return obj;
		}
	})();
});