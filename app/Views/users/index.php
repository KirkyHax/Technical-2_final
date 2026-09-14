<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="page-intro">
    <div>
        <span class="section-kicker">System access</span>
        <h2>The people behind the counter.</h2>
        <p>These records are retrieved from the <code>users</code> table through <code>UserModel</code>.</p>
    </div>
    <div class="record-count record-count-blue"><strong><?= count($users) ?></strong><span>Total records</span></div>
</section>

<section class="table-card">
    <div class="table-toolbar">
        <div>
            <h3>User Accounts</h3>
            <p>Authorized POS operators and account creation dates</p>
        </div>
        <span class="source-pill"><span></span> MySQL live</span>
    </div>

    <div class="table-scroll">
        <table>
            <caption class="sr-only">User account records retrieved from MySQL</caption>
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Created</th>
                    <th scope="col">Access</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users === []): ?>
                    <tr><td class="empty-cell" colspan="4">No user records found.</td></tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td data-label="User">
                                <div class="identity-cell">
                                    <span class="avatar avatar-blue"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></span>
                                    <div><strong><?= esc($user['full_name']) ?></strong><small>ID #<?= esc(str_pad((string) $user['id'], 4, '0', STR_PAD_LEFT)) ?></small></div>
                                </div>
                            </td>
                            <td data-label="Username"><span class="username-chip">@<?= esc($user['username']) ?></span></td>
                            <td data-label="Created"><time datetime="<?= esc($user['created_at']) ?>"><?= esc(date('M d, Y', strtotime($user['created_at']))) ?></time></td>
                            <td data-label="Access"><span class="status-pill status-blue">Authorized</span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>
