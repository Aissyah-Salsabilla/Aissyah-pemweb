<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor='#F5F5DC'>
    <center>
        <h2> Data Hewan</h2>s
<body>
    <table border="1" cellspacing="0">
        <tr bgcolor='white'>
            <th>Nama Hewan</th>  
            <th>Jenis Makanan</th>
            <th>Kelompok Hewan</th>
        </tr>

        <?php foreach ($hewans as $hewan) : ?>
            <tr>
                <td><?= $hewan['Nama_Hewan'] ?></td>
                <td><?= $hewan['Jenis_Makanan'] ?></td>
                <td><?= $hewan['Kelompok_Hewan'] ?></td>
        </tr>
        <?php endforeach; ?>
     </table> 
</body>
</html>