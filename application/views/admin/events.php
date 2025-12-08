<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/tickets.png'); ?>">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2C3E50;
            --accent-color: #E74C3C;
            --text-color: #333333;
            --background-color: #F5F6FA;
            --white: #FFFFFF;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--background-color);
            padding: 2rem;
        }

        /* Navigation Styles */
        .nav-container {
            background: var(--white);
            padding: 1rem 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 1400px;
            margin: 0 auto;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: rgba(74, 144, 226, 0.1);
        }

        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(74, 144, 226, 0.1);
            font-weight: 600;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        .admin-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .events-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .events-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .events-header h1 {
            color: var(--primary-color);
            margin: 0;
        }

        .btn-add {
            background: var(--success-color);
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .events-table {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            padding: 1.5rem 2rem;
        }

        .table-header h3 {
            margin: 0;
            font-size: 1.3rem;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--text-color);
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .event-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background: var(--success-color);
            color: var(--white);
        }

        .status-inactive {
            background: var(--danger-color);
            color: var(--white);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: var(--warning-color);
            color: var(--text-color);
        }

        .btn-edit:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            margin-bottom: 1.5rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background-color: var(--white);
            margin: 2% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header {
            background: linear-gradient(135deg, #4A90E2 0%, #357ABD 100%);
            color: var(--white);
            padding: 1.5rem 2rem;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .close {
            color: var(--white);
            font-size: 2rem;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .close:hover {
            opacity: 0.7;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        .error-message {
            color: var(--danger-color);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .help-text {
            color: #666;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .events-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
            }

            th, td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }

            .modal-content {
                width: 95%;
                margin: 5% auto;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .modal-footer {
                flex-direction: column;
            }
        }
        .btn-back-to-search {
            display: inline-block;
            background: #fff;
            color: #4A90E2;
            border: 2px solid #4A90E2;
            border-radius: 8px;
            padding: 10px 22px;
            font-size: 1.08em;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(74,144,226,0.10);
            transition: all 0.2s;
            margin-left: 1rem;
        }
        .btn-back-to-search i {
            margin-right: 0.5rem;
        }
        .btn-back-to-search:hover {
            background: #4A90E2;
            color: #fff;
            box-shadow: 0 4px 15px rgba(74,144,226,0.18);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="nav-container">
        <a href="<?php echo base_url('admin'); ?>" class="nav-brand">QuickTix Admin</a>
        <div class="nav-links">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="<?php echo base_url('admin/events'); ?>" class="nav-link active">
                <i class="fas fa-calendar-alt"></i>
                Event
            </a>
            <a href="<?php echo base_url('admin/transactions'); ?>" class="nav-link">
                <i class="fas fa-receipt"></i>
                Transaksi
            </a>
            <a href="<?php echo base_url('admin/users'); ?>" class="nav-link">
                <i class="fas fa-users"></i>
                User
            </a>
            <a href="<?php echo base_url('admin/validate_qr'); ?>" class="nav-link">
                <i class="fas fa-qrcode"></i>
                Validasi QR
            </a>
            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link" id="logoutLink">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
            <a href="<?php echo base_url('events/search'); ?>" class="btn-back-to-search">
                <i class="fas fa-arrow-left"></i> Kembali ke Cari Event
            </a>
        </div>
    </div>

    <div class="events-container">
        <div class="events-header">
            <h1><i class="fas fa-calendar-alt"></i> Manajemen Event</h1>
            <a href="<?php echo base_url('admin/add_event'); ?>" class="btn-add">
                <i class="fas fa-plus"></i>
                Tambah Event
            </a>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div style="background: var(--success-color); color: var(--white); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <i class="fas fa-check-circle"></i>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div style="background: var(--danger-color); color: var(--white); padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="events-table">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> Daftar Event</h3>
            </div>
            
            <?php if(empty($events)): ?>
                <div class="empty-state">
                    <i class="fas fa-calendar-times"></i>
                    <h3>Belum Ada Event</h3>
                    <p>Mulai dengan menambahkan event pertama Anda.</p>
                    <a href="<?php echo base_url('admin/add_event'); ?>" class="btn-add">
                        <i class="fas fa-plus"></i>
                        Tambah Event Pertama
                    </a>
                </div>
            <?php else: ?>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Event</th>
                                <th>Tipe</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Tiket Tersedia</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($events as $event): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo base_url($event['image_url']); ?>" alt="<?php echo $event['event_name']; ?>" class="event-image">
                                    </td>
                                    <td>
                                        <strong><?php echo $event['event_name']; ?></strong>
                                    </td>
                                    <td><?php echo $event['event_type']; ?></td>
                                    <td><?php echo $event['location']; ?></td>
                                    <td><?php echo date('d M Y H:i', strtotime($event['date'])); ?></td>
                                    <td>Rp <?php echo number_format($event['price'], 0, ',', '.'); ?></td>
                                    <td><?php echo $event['available_tickets']; ?></td>
                                    <td>
                                        <span class="status-badge <?php echo $event['status'] == 'active' ? 'status-active' : 'status-inactive'; ?>">
                                            <?php echo ucfirst($event['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-edit" onclick="openEditModal(<?php echo htmlspecialchars(json_encode($event)); ?>)">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="<?php echo base_url('admin/delete_event/' . $event['id']); ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editEventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-edit"></i> Edit Event</h2>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <div class="modal-body">
                <form id="editEventForm" method="POST">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_event_name">Nama Event *</label>
                            <input type="text" id="edit_event_name" name="event_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_event_type">Tipe Event *</label>
                            <select id="edit_event_type" name="event_type" required>
                                <option value="">Pilih Tipe Event</option>
                                <option value="Festival">Festival</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Konser">Konser</option>
                                <option value="Seminar">Seminar</option>
                                <option value="Exhibition">Exhibition</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_location">Lokasi *</label>
                            <input type="text" id="edit_location" name="location" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_date">Tanggal & Waktu *</label>
                            <input type="datetime-local" id="edit_date" name="date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_price">Harga Tiket (Rp) *</label>
                            <input type="number" id="edit_price" name="price" min="0" required>
                            <div class="help-text">Masukkan harga dalam rupiah (tanpa tanda koma atau titik)</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_available_tickets">Jumlah Tiket Tersedia *</label>
                            <input type="number" id="edit_available_tickets" name="available_tickets" min="1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_image_url">URL Gambar Event</label>
                        <div style="display: flex; gap: 0.5rem; align-items: flex-end;">
                            <div style="flex: 1;">
                                <input type="text" id="edit_image_url" name="image_url" placeholder="uploads/nama-gambar.jpg">
                                <div class="help-text">Kosongkan untuk menggunakan gambar default</div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="openImagePicker()" style="padding: 0.8rem 1rem; white-space: nowrap;">
                                <i class="fas fa-images"></i> Pilih Gambar
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_status">Status Event *</label>
                        <select id="edit_status" name="status" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_description">Deskripsi Event *</label>
                        <textarea id="edit_description" name="description" required></textarea>
                        <div class="help-text">Jelaskan detail event, fasilitas, dan informasi penting lainnya</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeEditModal()">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button type="submit" form="editEventForm" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>

    <!-- Image Picker Modal -->
    <div id="imagePickerModal" class="modal">
        <div class="modal-content" style="max-width: 900px;">
            <div class="modal-header">
                <h2><i class="fas fa-images"></i> Pilih Gambar Event</h2>
                <span class="close" onclick="closeImagePicker()">&times;</span>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 1rem;">
                    <input type="text" id="imageSearch" placeholder="Cari gambar..." style="width: 100%; padding: 0.8rem; border: 2px solid #e1e1e1; border-radius: 8px; font-size: 1rem;">
                </div>
                <div id="imageGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 1rem; max-height: 400px; overflow-y: auto;">
                    <!-- Images will be loaded here -->
                </div>
                <div id="noImagesMessage" style="text-align: center; padding: 2rem; color: #666; display: none;">
                    <i class="fas fa-images" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                    <p>Tidak ada gambar di folder uploads</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeImagePicker()">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout (Admin) -->
    <div id="logoutModal" class="modal-logout" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(44,62,80,0.18);align-items:center;justify-content:center;">
        <div class="modal-logout-content" style="background:#fff;padding:2rem 1.5rem;border-radius:14px;box-shadow:0 8px 32px rgba(102,126,234,0.18);max-width:340px;width:90%;text-align:center;position:relative;animation:modalFadeIn 0.2s;">
            <i class="fas fa-sign-out-alt" style="font-size:2.2rem;color:#764ba2;margin-bottom:0.7rem;"></i>
            <h3 style="color:#2C3E50;margin-bottom:0.7rem;">Konfirmasi Logout</h3>
            <p style="color:#555;margin-bottom:1.5rem;">Apakah Anda yakin ingin logout dari panel admin?</p>
            <div style="display:flex;gap:1rem;justify-content:center;">
                <button id="cancelLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#eee;color:#333;font-weight:500;cursor:pointer;transition:background 0.2s;">Batal</button>
                <button id="confirmLogoutBtn" style="padding:0.6rem 1.2rem;border:none;border-radius:6px;background:#764ba2;color:#fff;font-weight:500;cursor:pointer;box-shadow:0 2px 8px rgba(102,126,234,0.10);transition:background 0.2s;">Ya, Logout</button>
            </div>
        </div>
    </div>
    <style>
    @keyframes modalFadeIn { from { opacity:0; transform:translateY(20px);} to { opacity:1; transform:translateY(0);} }
    .modal-logout.show { display:flex !important; }
    .modal-logout .modal-logout-content { animation: modalFadeIn 0.2s; }
    .modal-logout button:hover { filter:brightness(0.95); }
    </style>
    <script>
        // Modal functions
        function openEditModal(eventData) {
            // Populate form fields with event data
            document.getElementById('edit_event_name').value = eventData.event_name;
            document.getElementById('edit_event_type').value = eventData.event_type;
            document.getElementById('edit_location').value = eventData.location;
            document.getElementById('edit_date').value = eventData.date.replace(' ', 'T');
            document.getElementById('edit_price').value = eventData.price;
            document.getElementById('edit_available_tickets').value = eventData.available_tickets;
            document.getElementById('edit_image_url').value = eventData.image_url;
            document.getElementById('edit_status').value = eventData.status;
            document.getElementById('edit_description').value = eventData.description;
            
            // Set form action
            document.getElementById('editEventForm').action = '<?php echo base_url("admin/edit_event/"); ?>' + eventData.id;
            
            // Show modal
            document.getElementById('editEventModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editEventModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('editEventModal');
            if (event.target == modal) {
                closeEditModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeEditModal();
            }
        });

        // Handle form submission
        document.getElementById('editEventForm').addEventListener('submit', function(e) {
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
            
            // Form will submit normally with CSRF token
        });

        // Image Picker Functions
        function openImagePicker() {
            document.getElementById('imagePickerModal').style.display = 'block';
            loadImages();
        }

        function closeImagePicker() {
            document.getElementById('imagePickerModal').style.display = 'none';
        }

        function loadImages() {
            const imageGrid = document.getElementById('imageGrid');
            const noImagesMessage = document.getElementById('noImagesMessage');
            
            // Show loading
            imageGrid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem;"><i class="fas fa-spinner fa-spin" style="font-size: 2rem;"></i><p>Memuat gambar...</p></div>';
            
            // Fetch images from server
            fetch('<?php echo base_url("admin/get_images"); ?>')
                .then(response => response.json())
                .then(data => {
                    imageGrid.innerHTML = '';
                    
                    if (data.images && data.images.length > 0) {
                        data.images.forEach(image => {
                            const imageCard = document.createElement('div');
                            imageCard.className = 'image-card';
                            imageCard.style.cssText = `
                                border: 2px solid #e1e1e1;
                                border-radius: 8px;
                                padding: 0.5rem;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                text-align: center;
                            `;
                            
                            imageCard.innerHTML = `
                                <img src="<?php echo base_url('uploads/'); ?>${image}" 
                                     alt="${image}" 
                                     style="width: 100%; height: 100px; object-fit: cover; border-radius: 4px; margin-bottom: 0.5rem;">
                                <div style="font-size: 0.8rem; color: #666; word-break: break-all;">${image}</div>
                            `;
                            
                            imageCard.onclick = function() {
                                selectImage(image);
                            };
                            
                            imageCard.onmouseenter = function() {
                                this.style.borderColor = 'var(--primary-color)';
                                this.style.transform = 'translateY(-2px)';
                                this.style.boxShadow = '0 4px 15px rgba(74, 144, 226, 0.2)';
                            };
                            
                            imageCard.onmouseleave = function() {
                                this.style.borderColor = '#e1e1e1';
                                this.style.transform = 'translateY(0)';
                                this.style.boxShadow = 'none';
                            };
                            
                            imageGrid.appendChild(imageCard);
                        });
                        
                        noImagesMessage.style.display = 'none';
                    } else {
                        noImagesMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    imageGrid.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #dc3545;"><i class="fas fa-exclamation-triangle" style="font-size: 2rem;"></i><p>Error memuat gambar</p></div>';
                });
        }

        function selectImage(imageName) {
            document.getElementById('edit_image_url').value = 'uploads/' + imageName;
            closeImagePicker();
        }

        // Image search functionality
        document.getElementById('imageSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const imageCards = document.querySelectorAll('#imageGrid .image-card');
            
            imageCards.forEach(card => {
                const imageName = card.querySelector('div').textContent.toLowerCase();
                if (imageName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Close image picker modal when clicking outside
        window.onclick = function(event) {
            var editModal = document.getElementById('editEventModal');
            var imageModal = document.getElementById('imagePickerModal');
            
            if (event.target == editModal) {
                closeEditModal();
            }
            if (event.target == imageModal) {
                closeImagePicker();
            }
        }

        // Close modals with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeEditModal();
                closeImagePicker();
            }
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutLink = document.getElementById('logoutLink');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogoutBtn = document.getElementById('cancelLogoutBtn');
        const confirmLogoutBtn = document.getElementById('confirmLogoutBtn');
        if (logoutLink && logoutModal) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();
                logoutModal.classList.add('show');
            });
        }
        if (cancelLogoutBtn && logoutModal) {
            cancelLogoutBtn.onclick = function() {
                logoutModal.classList.remove('show');
            };
        }
        if (confirmLogoutBtn && logoutLink) {
            confirmLogoutBtn.onclick = function() {
                window.location.href = logoutLink.href;
            };
        }
        // Tutup modal jika klik di luar konten
        logoutModal.addEventListener('click', function(e) {
            if (e.target === logoutModal) logoutModal.classList.remove('show');
        });
    });
    </script>
</body>
</html> 