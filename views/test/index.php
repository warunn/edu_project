<html>
<head>
<script type="text/javascript">
    $(document).ready(function(){
    	
})
</script>
</head>
<body>
<a href="#" onclick="return false" onmousedown="javascript:myfun()">link 1</a>
<iframe id="content" src="about:blank"></iframe>
<script type="text/javascript">
    	function myfun(){
    $("#content").attr("src","http://localhost/edu_project/test/loads");
    	}
</script>
</body>
</html>