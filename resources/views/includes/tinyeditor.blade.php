<!-- <script src="https://cdn.tiny.cloud/1/3nw8rwopv3ic9ga3l48105gssdf1x1b934ffp0druzagnyop/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "http://localhost:8000/",
      selector: '.mytextarea',
      height: 500,
	  plugins: [
	    "advlist autolink lists link image charmap print preview anchor",
	    "searchreplace visualblocks code fullscreen",
	    "insertdatetime media table paste imagetools wordcount",
	  ],
	  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | relative_urls: false",

	  file_browser_callback : function(field_name, url, type, win) {

	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }

    };

    tinymce.init(editor_config);

  </script>
