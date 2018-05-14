<div class="container">
  <div class="section-header-wrap section-header-default">
      <div class="section-header">Các tổ chức</div>
  </div>
  <div id="tree_list"></div>

  <!-- Using TreeJS -->
  <script type="text/javascript">
  $(document).ready(function(){
    //fill data to tree  with AJAX call
    $('#tree_list').jstree({
        'core' : {
            'data' : {
                "url" : "<?php echo base_url('organizations/res/'); ?>"
            }
        }
    }).bind("select_node.jstree", function (e, data) {
       var href = data.node.a_attr.href;
       if(href == '#')
       return '';
       document.location.href = href;
    });
  });
  </script>
</div>
