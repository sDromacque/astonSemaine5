<div class="classes-detail-container">
    <nav class="sub-nav">
        <h2>Class : <?= $class->getName(); ?></h2>
        <a href="classes.php" class="back">Classes list</a>
        <a href=""><button>Add an user</button></a>
    </nav>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Mark</th>
            <th>Date</th>
            <th>Coefficient</th>
            <th>Comment</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($notes as $note) : ?>
        <tr>
            <td><?= $note['firstname'].' '.$note['lastname'] ?></td>
            <td><?= round($note['note'], 1) ?> / 20</td>
            <td><?= $note['CreatedAt'] ?></td>
            <td><?= $note['coeff'] ?></td>
            <td><?= $note['comment'] ?></td>
            <td>
                <?php if (count($note['reviewedAt'])) : ?>
                This mark has been reviewed by the administration.
                <?php else: ?>
                This mark has not been yet reviewed yet. You can <a href="">edit this mark</a>.
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>