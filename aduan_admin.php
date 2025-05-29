<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>MOHON ADUAN</title>
    <style>
        :root {
            --primary: #3366CC;
            --secondary: #1E3A8A;
            --accent: #FFB347;
            --danger: #FF5A5A;
            --light-bg: #EEF2FF;
            --dark-text: #1E293B;
            --light-text: #FFFFFF;
            --input-bg: #F8FAFC;
            --shadow: rgba(0, 0, 0, 0.05);
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 12px;
            box-shadow: 0 10px 25px var(--shadow);
            border: none;
        }
        
        .card-header {
            background-color: var(--primary);
            color: var(--light-text);
            border-radius: 12px 12px 0 0 !important;
            padding: 1.5rem;
            position: relative;
        }
        
        .card-header h2 {
            font-weight: 700;
            margin-bottom: 0;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            box-shadow: 0 4px 6px rgba(51, 102, 204, 0.2);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: var(--danger);
            border-color: var(--danger);
        }
        
        .btn-danger:hover, .btn-danger:focus {
            background-color: #e04545;
            border-color: #e04545;
        }
        
        .btn-back {
            background-color: var(--secondary);
            color: white;
            border: none;
        }
        
        .btn-back:hover {
            background-color: #172b66;
            color: white;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #D1D5DB;
            background-color: var(--input-bg);
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 102, 204, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-text {
            color: #6B7280;
        }
        
        .card-footer {
            background-color: transparent;
            border-top: 1px solid #E5E7EB;
            padding: 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }
        
        .required-mark {
            color: var(--danger);
        }
        
        .form-header-icon {
            background-color: var(--accent);
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 30px;
            color: var(--secondary);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-with-icon {
            margin-top: 45px;
            text-align: center;
        }
        
        textarea {
            min-height: 120px;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #9CA3AF;
        }
        
        .input-with-icon input,
        .input-with-icon select,
        .input-with-icon textarea {
            padding-left: 45px;
        }
        
        .form-floating i {
            position: absolute;
            top: 28px;
            left: 15px;
            color: #9CA3AF;
        }
        
        .form-floating label {
            padding-left: 45px;
        }
        
        .form-floating input,
        .form-floating select,
        .form-floating textarea {
            padding-left: 45px !important;
        }
        
        .btn {
            padding: 10px 24px;
            font-weight: 600;
            border-radius: 8px;
        }
        
        .header-container {
            position: relative;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header header-with-icon">
                        <div class="form-header-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h2>Aduan Kerosakan Aset</h2>
                        <p class="mb-0 mt-2 text-white-50">Sistem Pengurusan Aduan Kerosakan</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="aduan_proses.php" method="POST">
                            <div class="form-group">
                                <label for="kategori" class="form-label">Kategori <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-list-ul"></i>
                                    <select name="kategori" id="kategori" class="form-select" required>
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <option value="Bangunan/Sivil (Encik Kamal)">Bangunan/Sivil (Encik Kamal)</option>
                                        <option value="Mekanikal/Elektrikal/Aircond (Encik Hairul)">Mekanikal/Elektrikal/Aircond (Encik Hairul)</option>
                                        <option value="Komputer/ ICT (Encik Hadi)">Komputer/ ICT (Encik Hadi)</option>     
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_aset" class="form-label">Jenis Aset <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-laptop"></i>
                                    <input type="text" class="form-control" id="jenis_aset" name="jenis_aset" placeholder="Contoh: Laptop, Projektor, Meja" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomborsiri" class="form-label">Nombor Siri Pendaftaran Aset <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-barcode"></i>
                                    <input type="text" class="form-control" id="nomborsiri" name="nomborsiri" placeholder="Contoh: AS-12345" required>
                                </div>
                                <small class="form-text">Sila masukkan nombor siri yang tertera pada aset.</small>
                            </div>

                            <div class="form-group">
                                <label for="tempat" class="form-label">Tempat Kerosakan <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Contoh: Bilik 2-01, Makmal Komputer" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kerosakan" class="form-label">Pengguna Terakhir <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" class="form-control" id="kerosakan" name="kerosakan" placeholder="Nama pengguna terakhir sebelum kerosakan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text" class="form-label">Perihal Kerosakan <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <textarea id="text" class="form-control" name="text" placeholder="Sila berikan butiran lengkap mengenai kerosakan yang berlaku" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tarikh" class="form-label">Tarikh Kerosakan <span class="required-mark">*</span></label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-calendar-alt"></i>
                                            <input type="date" class="form-control" id="tarikh" name="Tarikh kerosakan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_jawatan" class="form-label">Nama dan Jawatan <span class="required-mark">*</span></label>
                                        <div class="input-with-icon">
                                            <i class="fas fa-id-card"></i>
                                            <input type="text" class="form-control" id="nama_jawatan" name="Nama dan Jawatan" placeholder="Contoh: Ali bin Abu - Pensyarah" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="emel" class="form-label">Emel untuk Maklumbalas <span class="required-mark">*</span></label>
                                <div class="input-with-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" class="form-control" id="emel" name="emel" placeholder="Contoh: nama@domain.com" required>
                                </div>
                            </div>
                        
                    </div>
                    <div class="card-footer">
                        <a href="maklumat_user.php" class="btn btn-back">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-eraser me-2"></i> Reset
                        </button>
                        <button type="submit" name="aduanuser" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-2"></i> Hantar Aduan
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>