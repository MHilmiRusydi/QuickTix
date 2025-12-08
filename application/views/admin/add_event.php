<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-header {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h1 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--text-color);
            opacity: 0.8;
        }

        .form-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
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

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #f0f0f0;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #357ABD;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(74, 144, 226, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: var(--white);
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

        .modal-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
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

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                gap: 0.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }
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
            <span class="admin-badge">ADMIN</span>
        </div>
    </div>

    <div class="form-container">
        <div class="form-header">
            <h1><i class="fas fa-plus-circle"></i> Tambah Event Baru</h1>
            <p>Isi form di bawah untuk menambahkan event baru ke sistem</p>
        </div>

        <div class="form-card">
            <?php echo form_open('admin/add_event'); ?>
                <div class="form-row">
                    <div class="form-group">
                        <label for="event_name">Nama Event *</label>
                        <input type="text" id="event_name" name="event_name" value="<?php echo set_value('event_name'); ?>" required>
                        <?php echo form_error('event_name', '<div class="error-message">', '</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_type">Tipe Event *</label>
                        <select id="event_type" name="event_type" required>
                            <option value="">Pilih Tipe Event</option>
                            <option value="Festival" <?php echo set_select('event_type', 'Festival'); ?>>Festival</option>
                            <option value="Workshop" <?php echo set_select('event_type', 'Workshop'); ?>>Workshop</option>
                            <option value="Konser" <?php echo set_select('event_type', 'Konser'); ?>>Konser</option>
                            <option value="Seminar" <?php echo set_select('event_type', 'Seminar'); ?>>Seminar</option>
                            <option value="Exhibition" <?php echo set_select('event_type', 'Exhibition'); ?>>Exhibition</option>
                        </select>
                        <?php echo form_error('event_type', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="location">Lokasi *</label>
                        <input type="text" id="location" name="location" value="<?php echo set_value('location'); ?>" required>
                        <?php echo form_error('location', '<div class="error-message">', '</div>'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Tanggal & Waktu *</label>
                        <input type="datetime-local" id="date" name="date" value="<?php echo set_value('date'); ?>" required>
                        <?php echo form_error('date', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Harga Tiket (Rp) *</label>
                        <input type="number" id="price" name="price" value="<?php echo set_value('price'); ?>" min="0" required>
                        <?php echo form_error('price', '<div class="error-message">', '</div>'); ?>
                        <div class="help-text">Masukkan harga dalam rupiah (tanpa tanda koma atau titik)</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="available_tickets">Jumlah Tiket Tersedia *</label>
                        <input type="number" id="available_tickets" name="available_tickets" value="<?php echo set_value('available_tickets'); ?>" min="1" required>
                        <?php echo form_error('available_tickets', '<div class="error-message">', '</div>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_url">URL Gambar Event</label>
                    <div style="display: flex; gap: 0.5rem; align-items: flex-end;">
                        <div style="flex: 1;">
                            <input type="text" id="image_url" name="image_url" value="<?php echo set_value('image_url'); ?>" placeholder="uploads/nama-gambar.jpg">
                            <div class="help-text">Kosongkan untuk menggunakan gambar default</div>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="openImagePicker()" style="padding: 0.8rem 1rem; white-space: nowrap;">
                            <i class="fas fa-images"></i> Pilih Gambar
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Event *</label>
                    <textarea id="description" name="description" required><?php echo set_value('description'); ?></textarea>
                    <?php echo form_error('description', '<div class="error-message">', '</div>'); ?>
                    <div class="help-text">Jelaskan detail event, fasilitas, dan informasi penting lainnya</div>
                </div>

                <div class="form-actions">
                    <a href="<?php echo base_url('admin/events'); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Event
                    </button>
                </div>
            <?php echo form_close(); ?>
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

    <script>
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
            document.getElementById('image_url').value = 'uploads/' + imageName;
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
            var imageModal = document.getElementById('imagePickerModal');
            if (event.target == imageModal) {
                closeImagePicker();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImagePicker();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan konfirmasi logout
            const logoutLink = document.getElementById('logoutLink');
            if (logoutLink) {
                logoutLink.addEventListener('click', function(e) {
                    if (!confirm('Apakah Anda yakin ingin logout?')) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</body>
</html> 