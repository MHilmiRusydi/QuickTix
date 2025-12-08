<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card profile-card mb-4">
                <div class="card-body text-center">
                    <div class="profile-image mb-3">
                        <img src="<?= base_url('assets/img/default-avatar.png') ?>" alt="Profile" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h4 class="mb-1"><?= $user['username'] ?></h4>
                    <p class="text-muted mb-3"><?= $user['email'] ?></p>
                    <a href="<?= base_url('profile/settings') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-cog me-2"></i>Edit Profil
                    </a>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Statistik</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tiket Aktif</span>
                        <span class="badge bg-primary">0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Event Dihadiri</span>
                        <span class="badge bg-success">0</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Total Transaksi</span>
                        <span class="badge bg-info">0</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Informasi Profil</h5>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Username</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0"><?= $user['username'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0"><?= $user['email'] ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Bergabung Sejak</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0"><?= date('d F Y', strtotime($user['created_at'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tiket Terbaru</h5>
                    <div class="text-center py-4">
                        <i class="fas fa-ticket-alt fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada tiket yang dibeli</p>
                        <a href="<?= base_url('events/search') ?>" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Cari Event
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
}

.profile-image img {
    border: 5px solid #fff;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.btn-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
    border: none;
    padding: 8px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(78,115,223,0.3);
}

.badge {
    padding: 8px 12px;
    border-radius: 6px;
    font-weight: 500;
}

.text-muted {
    color: #6c757d !important;
}
</style> 