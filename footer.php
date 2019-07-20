    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="froala_editor_3.0.3/js/plugins/quote.min.js"></script>

    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>

    <script>
    function posts(str) {
      $.ajax({
      type: "POST",
      url: str,
      success: function(data){
        $("#content").html(data);
        const editorInstance = new FroalaEditor('#edit', {
        theme: 'gray',
        enter: FroalaEditor.ENTER_P,
        events: {
          initialized: function () {
            const editor = this
            document.getElementById('preview').innerHTML = editor.html.get()
          },
          contentChanged: function () {
            const editor = this
            document.getElementById('preview').innerHTML = editor.html.get()
          }
        }
        });
      }
      });
    }
  </script>     