<div class="content-wrap">
    <div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Danh sách tổ chức</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="organizations">
            </div>
        </div>
    </div>

    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.4/jstree.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function loadData() {
                function showTreeList(tree, data) {
                    $(tree).jstree({
                        "core": {
                            "themes": {
                                "responsive": false,
                                "icons": false
                            },
                            // so that create works
                            "check_callback": true,
                            'data': data
                        }
                    }).bind("select_node.jstree", function (e, data) {
                        document.location.href = data.node.a_attr.link;
                    });
                }

                function standardizeData(data) {
                    for (var i = 0, n = data.length; i < n; ++i) {
                        data[i].text = data[i].name;
                        data[i].a_attr = {link: 'home/org/'.replace('0', data[i].id)};
                        if (data[i].parent === null) {
                            data[i].state = {opened: true};
                            data[i].parent = '#';
                        }
                    }
                }

                $.ajax({
                    url: 'http://sam.doantn.hcmus.edu.vn/api/organizations/',
                    type: 'GET',
                    data: {},
                    success: function (res) {
                        if (res.code === SUCCESS) {
                            var data = res.data;
                            standardizeData(data);
                            console.log(data);
                            showTreeList('#organizations', data);
                        }
                    }
                });
            }

            loadData();
        });
    </script>
