<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>

    <link rel="stylesheet" href="/lab7_php_ci/public/assets/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<h1>Daftar Artikel</h1>

<input type="text" id="keyword" placeholder="Cari artikel...">

<button id="sort-asc">Urutkan A-Z</button>

<br><br>

<div id="article-container">

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Gambar</th>
        </tr>

        <?php if(isset($artikel)) { ?>

            <?php foreach($artikel as $row) { ?>

            <tr>

                <td><?= $row['id']; ?></td>

                <td><?= $row['judul']; ?></td>

                <td>
                    <img src="/lab7_php_ci/public/assets/uploads/<?= $row['gambar']; ?>" width="120">
                </td>

            </tr>

            <?php } ?>

        <?php } ?>

    </table>

</div>

<script>

function renderTable(data)
{
    let html = '';

    html += `
    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Gambar</th>
        </tr>
    `;

    data.artikel.forEach(function(row){

        html += `
        <tr>

            <td>${row.id}</td>

            <td>${row.judul}</td>

            <td>
                <img src="/lab7_php_ci/public/assets/uploads/${row.gambar}" width="120">
            </td>

        </tr>
        `;

    });

    html += `</table>`;

    $('#article-container').html(html);
}

$(document).ready(function(){

    $('#keyword').keyup(function(){

        let keyword = $(this).val();

        $.ajax({

            url: '/lab7_php_ci/public/artikel/admin',

            type: 'GET',

            data: {
                q: keyword
            },

            dataType: 'json',

            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },

            success: function(data)
            {

                renderTable(data);

            }

        });

    });

    $('#sort-asc').click(function(){

        $.ajax({

            url: '/lab7_php_ci/public/artikel/admin',

            type: 'GET',

            dataType: 'json',

            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },

            success: function(data)
            {

                data.artikel.sort(function(a, b){

                    return a.judul.localeCompare(b.judul);

                });

                renderTable(data);

            }

        });

    });

});

</script>

</body>
</html>