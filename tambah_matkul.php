<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Kode			= $_POST['Kode'];
			$Mata_Kuliah			= $_POST['Mata_Kuliah'];
			$SKS	= $_POST['SKS'];
			$Dosen_Pengajar		= $_POST['Dosen_Pengajar'];

			$cek = mysqli_query($koneksi, "SELECT * FROM mapel WHERE Kode='$Kode'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mapel(Kode, Mata_Kuliah, SKS, Dosen_Pengajar) VALUES('$Kode', '$Mata_Kuliah', '$SKS', '$Dosen_Pengajar')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_matkul";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, KODE sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_matkul" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Kode" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mata Kuliah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Mata_Kuliah" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Laki-Laki" required>Dua SKS
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Perempuan" required>Tiga SKS
						</label>
                        <label class="btn btn-secondary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Perempuan" required>Empat SKS
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Dosen Pengajar</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Dosen Pengajar</option>
						<option value="Web Programming">ASEP HARDIYANTO NUGROHO, S.Kom., M.Kom</option>
						<option value="SISTEM DIGITAL">IMAM HALIM MURSYIDIN, S.Kom., M.Kom</option>
						<option value="MATEMATIKA DISKRIT">ARIS SOPYAN RIPANDI, S.Kom., M.Kom</option>
						<option value="STATISTIK DESKRIPTIF">NIA KOMALASARI, S.Si.,M.Kom.</option>
						<option value="METODE PENELITIAN">TAUFIK HIDAYAT, S.Kom., M.Kom</option>
						<option value="SISTEM MICROPROCESSOR">AHMAD SYAUKI, S.Kom, M.Kom</option>
						<option value="ARTIFICIAL INTELLIGENCE (AI)">TAUFIK HIDAYAT, S.Kom., M.Kom</option>
						<option value="ILMU SOSIAL DAN BUDAYA DASAR">Dr. M. I. SUHIFATULLAH, Drs.,M.Pd.</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>