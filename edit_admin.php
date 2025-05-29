<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemas Kini Aduan Kerosakan Aset</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #ffffff;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #3366CC 0%, #1E3A8A 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.1)"/></svg>');
        }

        .header h1 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .header h1 i {
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .back-btn {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .back-btn i {
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            padding: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #3366CC;
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.1);
            transform: translateY(-1px);
        }

        .form-control:hover {
            border-color: #cbd5e0;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #3366CC;
            pointer-events: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-group.has-icon .form-control {
            padding-right: 50px;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #3366CC;
            pointer-events: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        select.form-control {
            appearance: none;
            background-image: none;
            cursor: pointer;
        }

        .status-group {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #e2e8f0;
        }

        .status-group .form-label {
            color: #2d3748;
            font-size: 1.1rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
        }

        .status-group .form-label::before {
            content: '\f0eb';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: #FFB347;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 16px 32px;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 180px;
        }

        .btn i {
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3366CC 0%, #1E3A8A 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(51, 102, 204, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(51, 102, 204, 0.4);
        }

        .btn-reset {
            background: linear-gradient(135deg, #FF5A5A 0%, #FF3333 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 90, 90, 0.3);
        }

        .btn-reset:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 90, 90, 0.4);
        }

        .form-section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #FFB347;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
        }

        .section-title i {
            color: #3366CC;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 4px solid;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert i {
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .alert-info {
            background: rgba(51, 102, 204, 0.1);
            border-left-color: #3366CC;
            color: #1E3A8A;
        }

        .alert-error {
            background: rgba(255, 90, 90, 0.1);
            border-left-color: #FF5A5A;
            color: #CC0000;
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 15px;
            }

            .header {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .back-btn {
                position: static;
                margin-top: 15px;
                display: inline-block;
            }

            .form-container {
                padding: 25px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                min-width: auto;
            }
        }

        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .form-control:invalid {
            border-color: #FF5A5A;
        }

        .form-control:valid {
            border-color: #48BB78;
        }

        .tooltip {
            position: relative;
        }

        .tooltip::after {
            content: attr(data-tooltip);
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: #2d3748;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .tooltip:hover::after {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-tools"></i> Sistem Aduan Kerosakan Aset</h1>
            <p>Kemas Kini Maklumat Aduan</p>
            <a href="maklumat_user.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="form-container">
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <div>
                    <strong>Info:</strong> Sila kemaskini maklumat aduan dengan lengkap dan tepat.
                </div>
            </div>

            <form action="process_edit.php" method="POST" id="complaintForm">
                <input type="hidden" name="no_id" value="1">

                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-user"></i>
                        Maklumat Pelapor
                    </div>
                    <div class="form-grid">
                        <div class="form-group has-icon">
                            <label class="form-label">Nama dan Jawatan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Contoh: Ahmad bin Ali - Pegawai ICT" value="Ahmad bin Ali - Pegawai ICT" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Peranan/Role</label>
                            <div class="select-wrapper">
                                <select name="role" class="form-control" required>
                                    <option value="" disabled>Pilih Peranan</option>
                                    <option value="Pentadbir Sistem" selected>Pentadbir Sistem</option>
                                    <option value="Pegawai Teknikal">Pegawai Teknikal</option>
                                    <option value="Staf Akademik">Staf Akademik</option>
                                    <option value="Staf Sokongan">Staf Sokongan</option>
                                    <option value="Pelajar">Pelajar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-cogs"></i>
                        Maklumat Aset
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Jenis Aset</label>
                            <div class="select-wrapper">
                                <select name="jenis_aset" class="form-control" required>
                                    <option value="" disabled>Pilih Jenis Aset</option>
                                    <option value="Peralatan Komputer" selected>Peralatan Komputer</option>
                                    <option value="Perabut">Perabut</option>
                                    <option value="Tandas">Tandas</option>
                                    <option value="Peralatan Makmal">Peralatan Makmal</option>
                                    <option value="Peralatan Elektrik">Peralatan Elektrik</option>
                                    <option value="Suis Elektrik">Suis Elektrik</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-icon">
                            <label class="form-label">Nombor Siri Pendaftaran</label>
                            <input type="text" class="form-control" name="no_siri" placeholder="Contoh: ICT-2024-001" value="ICT-2024-001">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tempat Kerosakan</label>
                            <div class="select-wrapper">
                                <select name="tempat_rosak" class="form-control" required>
                                    <option value="" disabled>Pilih Tempat</option>
                                    <option value="Asrama">Asrama</option>
                                    <option value="Dewan Makan">Dewan Makan</option>
                                    <option value="Library" selected>Library</option>
                                    <option value="Makmal">Makmal</option>
                                    <option value="Bilik Kuliah">Bilik Kuliah</option>
                                    <option value="Cafe">Cafe</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-icon">
                            <label class="form-label">Tarikh Kerosakan</label>
                            <input type="date" class="form-control" name="tarikh_rosak" value="2024-01-15" required>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-exclamation-triangle"></i>
                        Butiran Kerosakan
                    </div>
                    <div class="form-grid">
                        <div class="form-group has-icon">
                            <label class="form-label">Pengguna Terakhir</label>
                            <input type="text" class="form-control" name="userterakhir" placeholder="Nama pengguna terakhir" value="Siti Aminah" required>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Perihal Kerosakan</label>
                            <textarea class="form-control" name="ulasan" rows="4" placeholder="Terangkan dengan terperinci kerosakan yang berlaku..." required>Komputer tidak boleh boot up. Skrin biru muncul semasa startup. Mungkin ada masalah dengan hard disk atau RAM.</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="status-group">
                        <label class="form-label">Status Permohonan</label>
                        <div class="select-wrapper">
                            <select name="lulus_jabatan" class="form-control" required>
                                <option value="Dalam Proses" selected>Dalam Proses</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Sedang Dibaiki">Sedang Dibaiki</option>
                                <option value="Siap Dibaiki">Siap Dibaiki</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="submit" name="staffedit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Kemas Kini Permohonan
                    </button>
                    <button type="reset" class="btn btn-reset">
                        <i class="fas fa-undo"></i>
                        Reset Borang
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form validation and UX improvements
        document.getElementById('complaintForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            submitBtn.disabled = true;
            
            // Re-enable after 3 seconds to prevent permanent lock
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-save"></i> Kemas Kini Permohonan';
                submitBtn.disabled = false;
            }, 3000);
        });

        // Auto-resize textarea
        document.querySelector('textarea').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });

        // Enhanced form interactions
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Reset confirmation
        document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
            if (!confirm('Adakah anda pasti ingin mengosongkan semua maklumat dalam borang ini?')) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>