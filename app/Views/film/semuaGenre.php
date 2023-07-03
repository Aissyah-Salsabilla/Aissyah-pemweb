<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<p>

</p>
<p>

</p>
<h4>
    Data genre
</h4>
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped">
        <tr>
            <th>No</th> 
            <th>Genre</th>
            <th>Action</th>

        </tr>
        <?php $i = 1 ;?>
        <?php foreach ($semuaGenre as $genre) : ?>
            <tr>
                <td><?= $i++;?></td>
                <td><?= $genre['nama_genre'] ?></td>
               
                <td>
                    <a href="" class="btn btn-success">Update</a>
                    <a href="" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endforeach; ?>

     </table>
 </div>
 </div>
<?= $this->endSection() ?>