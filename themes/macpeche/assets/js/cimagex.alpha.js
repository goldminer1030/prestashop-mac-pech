function cimagex (node, size) {

	/*
	*	Pili Malfray @ 2015
	*
	*	Convert <img> to <div> with background-image.
	*/

	if(node.length > 1) {

		for(var i=0; i < node.length; i++) {
			cimagex(node[i]);
		}

	} else if(node.constructor.name != 'NodeList') {

		// New node
		var nodeCover = document.createElement('div');

		// Copy properties
		for(prop in node) {
			if(prop != "src" && node.getAttribute(prop) != null) {
				nodeCover.prop = node.getAttribute(prop);
			}
		}

		// Assign new properties
		nodeCover.display = "block";
		nodeCover.style.width = "100%";
		nodeCover.style.height = "100%";
		nodeCover.style.backgroundImage = "url('"+node.src+"')";
		nodeCover.style.backgroundSize = (size == undefined ? "cover" : size);
		nodeCover.style.backgroundRepeat = "no-repeat";
		nodeCover.style.backgroundPosition = "center";
		// nodeCover.style.backgroundColor = "#333";
		nodeCover.className = "cimagex";

		// Image Cache
		var img = new Image();
		img.src = node.src;

		// Replace node
		node.parentNode.replaceChild(nodeCover, node);

	}
};