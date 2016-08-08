<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/assets/tinymce/js/tinymce/plugins/codesample/css/prism.css">
  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script src='/js/jquery-2.2.4.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: "codesample",
  toolbar: "codesample"
  });
  </script>
</head>
<body>
<div style="width: 400px;border: 1px solid black;" id="text"></div>

<pre class="language-markup"><code></code></pre>

  <form method="#" onsubmit="return false">
    <textarea id="mytextarea">Hello, World!</textarea>

    <button>sdfsd</button>
  </form>

  <script>
  	$('button').click(function () {
  		$('code').append(tinyMCE.get('mytextarea').getContent());
  	});
  </script>
  <script src="prism.js"></script>
</body>
</html>