/* web http://jingyan.baidu.com/article/11c17a2c771a62f446e39d14.html */
/*  add by jameskid Good!!! 2016.6.24*/
CodeMirror.commands.save = function(){ alert("Saving"); };
function getByClass(sClass){
	var aResult=[];
	var aEle=document.getElementsByTagName('*');
	for(var i=0;i<aEle.length;i++){
		/*将每个className拆分*/
		var arr=aEle[i].className.split(/\s+/);
		for(var j=0;j<arr.length;j++){
			/*判断拆分后的数组中有没有满足的class*/
			if(arr[j]==sClass){
				aResult.push(aEle[i]);
			}
		}
	}
	return aResult;
};


function runRender(type){
	var aBox=getByClass("code_"+type);
	for(var i=0;i<aBox.length;i++){
		//alert(aBox[i].innerHTML);
		//var editor = CodeMirror.fromTextArea(document.getElementById("code_javascript"), {
		var editor = CodeMirror.fromTextArea(aBox[i], {
			lineNumbers: true,
			mode: "text/x-csrc",
			keyMap: "vim",
			matchBrackets: true,
			showCursorWhenSelecting: true,
			theme:"blackboard",
		});
	}
};
runRender('javascript');
runRender('c');
runRender('java');
runRender('bash');

runRender('C');
runRender('Java');
runRender('cpp');

var commandDisplay = document.getElementById('command-display');
var keys = '';
CodeMirror.on(editor, 'vim-keypress', function(key) {
	keys = keys + key;
	commandDisplay.innerHTML = keys;
});
CodeMirror.on(editor, 'vim-command-done', function(e) {
	keys = '';
	commandDisplay.innerHTML = keys;
});
