<!DOCTYPE html>
<html>
<head>

 
	
	<title>Sandi UKPBJ - Printout Pengajuan Akun Non Penyedia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<input type="button" id="btnprint" value="Print this Page" onclick="print_page()" />
	<div class="row">
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<div class="col"> 
		<br/>
		<h3 style text-align="center;">Pengajuan Akun Non Penyedia</h3>
		<br/>
		<br/>
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div> 
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	</div>

<div class="container justify-content-center">
<table>	
	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">1. NAMA</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->nama}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">2. NIP</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->nip}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">3. NIK </td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->nik}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">3. JABATAN </td>
		<td style="padding-left: 50px;">:  {{$pangkat[0]->pangkat}} {{$pangkat[0]->golongan}}/{{$pangkat[0]->ruang}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">4. SERTIFIKAT PENGADAAN (*JIKA ADA)</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->sertifikat}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">6. NOMOR TELEPON POKJA/PPKOM/PPBJ</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->telepon}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>
	 
	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">7. EMAIL TELEPON POKJA/PPKOM/PPBJ</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->email}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">8. ALAMAT</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->alamat}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">9. SKPD</td>
		<td style="padding-left: 50px;">: {{$printakun[0]->nama_skpd}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>	

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">10. BAGIAN/KELURAHAN (*KHUSUS DINAS KESEHATAN, KELURAHAN, SEKRETARIAT DAERAH)</td>
		<td style="padding-left: 50px;">: {{$printakun[0]->nama_cabang}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">11. JENIS PENGAJUAN</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->type_pengajuan}}</td>
	</tr>
	
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">12. NOMOR SK/ SURAT TUGAS</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->nomor_sk}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">13. MASA BERLAKU</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->masa_berlaku}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">14. KETERANGAN</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->keterangan}}</td>
	</tr>
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">15. USERNAME ANDA</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->user_id}}</td>
	</tr> 
	<tr>
		<td>
		<br>
		</td>
	</tr>

	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">16. PASSWORD ANDA</td>
		<td style="padding-left: 50px;">:  {{$printakun[0]->password}}</td>
	</tr>
	
	<!--
	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">Yang Bertandatangan</td>
		print '<img src="/public/assets/uploads'.$printakun[0]->lampiran_ttd.'" />';
		<td style="padding-left:80px;"></td>
	</tr>
	
	while ($printakun[0]->lampiran_ttd = mysqli_fetch_array($result,MYSQLI_BOTH)) {
    echo "<img src='/public/assets/uploads".$printakun['lampiran_ttd']."'>";
    }
    -->
	
	<tr>
		<td class="text-nowrap" style="padding-left: 80px;">Yang Bertanda Tangan</td>
		<td style="padding-left: 50px;">:  
		<img src="/public/assets/uploads/
		<?php echo $printakun[0]->lampiran_ttd ?>" width="250" height="100"
		/>
		</td>
	</tr>

	
	<tr>
		<td>
		<br>
		</td>
	</tr>

</table>
</div>
		
<div class="col" style=" text-align: right; padding-right: 120px;"> Jambi, {{Carbon\Carbon::parse()->translatedFormat('d F Y') }} </div> </div></div>
	<div class="container">
	<script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script>
</body>
</html>
