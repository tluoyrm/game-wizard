<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
        <th>IP</th>
        <th>MAC</th>
        <th>Action</th>
        <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($accountLogList as $logItem): ?>
        <tr>
            <td><?= $logItem->ip ?></td>
            <td><?= $logItem->mac ?></td>
            <td><?= $logItem->action ?></td>
            <td><?= $logItem->time ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>