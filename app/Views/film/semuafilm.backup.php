<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Film 2023</h1>
    <table border="1" cellspacing="0" >
        <tr>
            <th>No</th>
            <th>cover</th>
            <th>Nama Film</th>  
            <th>Genre</th>
            <th>Duration</th>
        </tr>
        <?php $i = 1;
        foreach ($semuafilm as $film) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                <img style="width: 50px;" src="/assets/cover/<?= $film ['cover']?>" alt="">
                </td>    
            <td><?= $film['nama_film'] ?></td>
            <td><?= $film['genre'] ?></td>
            <td><?= $film['duration'] ?></td>
        </tr>
        <?php endforeach; ?>
        </table>

</body>
</html>