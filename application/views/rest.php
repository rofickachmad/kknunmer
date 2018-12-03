
<div id="container">
    <h1>REST Server Tests</h1>

    <div id="body">

        <h2><a href="<?php echo site_url(); ?>">Home</a></h2>

        <p>
            See the article
            <a href="http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/" target="_blank">
                http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/
            </a>
        </p>

        <p>
            The master project repository is
            <a href="https://github.com/chriskacerguis/codeigniter-restserver" target="_blank">
                https://github.com/chriskacerguis/codeigniter-restserver
            </a>
        </p>

        <p>
            Click on the links to check whether the REST server is working.
        </p>

        <ol>
            <li><a href="<?php echo site_url('api/example/users'); ?>">Users</a> - defaulting to JSON</li>
            <li><a href="<?php echo site_url('api/example/users/format/csv'); ?>">Users</a> - get it in CSV</li>
            <li><a href="<?php echo site_url('api/example/users/id/1'); ?>">User #1</a> - defaulting to JSON  (users/id/1)</li>
            <li><a href="<?php echo site_url('api/example/users/1'); ?>">User #1</a> - defaulting to JSON  (users/1)</li>
            <li><a href="<?php echo site_url('api/example/users/id/1.xml'); ?>">User #1</a> - get it in XML (users/id/1.xml)</li>
            <li><a href="<?php echo site_url('api/example/users/id/1/format/xml'); ?>">User #1</a> - get it in XML (users/id/1/format/xml)</li>
            <li><a href="<?php echo site_url('api/example/users/id/1?format=xml'); ?>">User #1</a> - get it in XML (users/id/1?format=xml)</li>
            <li><a href="<?php echo site_url('api/example/users/1.xml'); ?>">User #1</a> - get it in XML (users/1.xml)</li>
            <li><a id="ajax" href="<?php echo site_url('api/example/users/format/json'); ?>">Users</a> - get it in JSON (AJAX request)</li>
            <li><a href="<?php echo site_url('api/example/users.html'); ?>">Users</a> - get it in HTML (users.html)</li>
            <li><a href="<?php echo site_url('api/example/users/format/html'); ?>">Users</a> - get it in HTML (users/format/html)</li>
            <li><a href="<?php echo site_url('api/example/users?format=html'); ?>">Users</a> - get it in HTML (users?format=html)</li>
        </ol>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
//<![CDATA[

    $(function() {

        $("#ajax").on("click", function(evt) {

            evt.preventDefault();

            $.ajax({

                url: $(this).attr("href"), // URL from the link that was clicked on.

            }).done(function (data) {

                // The 'data' parameter is an array of objects that can be looped over.

                alert(window.JSON.stringify(data));

            }).fail(function () {

                alert('Oh no! A problem with the AJAX request!');
            });
        });
    });

//]]>
</script>
