<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Kode'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Nim = $_GET['Kode'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mapel WHERE Kode='$Kode'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Mata_Kuliah			  = $_POST['Mata_Kuliah'];
			$SKS	= $_POST['SKS'];
			$Dosen_Pengajar	= $_POST['Dosen_Pengajar'];

			$sql = mysqli_query($koneksi, "UPDATE mapel SET Mata_Kuliah='$Mata_Kuliah', SKS='$SKS', Dosen_Pengajar='$Dosen_Pengajar' WHERE Kode='$Kode'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_matkul";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_mhs&Nim=<?php echo $Nim; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kode</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Kode" class="form-control" size="4" value="<?php echo $data['Kode']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Mata Kuliah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Mata_Kuliah" class="form-control" value="<?php echo $data['Mata_Kuliah']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SKS</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Dua" <?php if($data['SKS'] == 'Dua SKS'){ echo 'checked'; } ?> required>Dua SKS
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Tiga" <?php if($data['SKS'] == 'Tiga SKS'){ echo 'checked'; } ?> required>Tiga SKS
						</label>
                        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="SKS" value="Empat" <?php if($data['SKS'] == 'Empat SKS'){ echo 'checked'; } ?> required>Empat SKS
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studi" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Web Programming" <?php if($data['Dosen_Pengajar'] == 'ASEP HARDIYANTO NUGROHO, S.Kom., M.Kom'){ echo 'selected'; } ?>>ASEP HARDIYANTO NUGROHO, S.Kom., M.Kom</option>
						<option value="SISTEM DIGITAL" <?php if($data['Dosen_Pengajar'] == 'IMAM HALIM MURSYIDIN, S.Kom., M.Kom'){ echo 'selected'; } ?>>IMAM HALIM MURSYIDIN, S.Kom., M.Kom</option>
						<option value="MATEMATIKA DISKRIT" <?php if($data['Dosen_Pengajar'] == 'ARIS SOPYAN RIPANDI, S.Kom., M.Kom'){ echo 'selected'; } ?>>ARIS SOPYAN RIPANDI, S.Kom., M.Kom</option>
						<option value="STATISTIK DESKRIPTIF" <?php if($data['Dosen_Pengajar'] == 'NIA KOMALASARI, S.Si.,M.Kom.'){ echo 'selected'; } ?>>NIA KOMALASARI, S.Si.,M.Kom.</option>
						<option value="METODE PENELITIAN" <?php if($data['Dosen_Pengajar'] == 'TAUFIK HIDAYAT, S.Kom., M.Kom'){ echo 'selected'; } ?>>TAUFIK HIDAYAT, S.Kom., M.Kom</option>
						<option value="SISTEM MICROPROCESSOR" <?php if($data['Dosen_Pengajar'] == 'AHMAD SYAUKI, S.Kom, M.Kom'){ echo 'selected'; } ?>>AHMAD SYAUKI, S.Kom, M.Kom</option>
						<option value="ARTIFICIAL INTELLIGENCE (AI)" <?php if($data['Dosen_Pengajar'] == 'TAUFIK HIDAYAT, S.Kom., M.Kom'){ echo 'selected'; } ?>>TAUFIK HIDAYAT, S.Kom., M.Kom</option>
						<option value="ILMU SOSIAL DAN BUDAYA DASAR" <?php if($data['Dosen_Pengajar'] == 'Dr. M. I. SUHIFATULLAH, Drs.,M.Pd.'){ echo 'selected'; } ?>>Dr. M. I. SUHIFATULLAH, Drs.,M.Pd.</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_matkul" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>