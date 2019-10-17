
<h3><small>Hasil Pencarian dari dengan kata kunci : </small> "<?= $this->input->get('q'); ?>"</h3>
<?php foreach ($cari_spd as $cari): ?>
<div class="media search-media">
<div class="media-left">
<a href="#">																	
<!--img class="media-object" data-src="holder.js/72x72" alt="72x72" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2272%22%20height%3D%2272%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2072%2072%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16da2c50409%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16da2c50409%22%3E%3Crect%20width%3D%2272%22%20height%3D%2272%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2217.4609375%22%20y%3D%2240.5%22%3E72x72%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 72px; height: 72px;"-->																		
</a>
	</div>																											 								
																				
																				<div class="media-body">
																				<div>
																				<h4 class="media-heading">
																				<a href="<?= base_url("spt/dalam/detail-spt-sppd").'/'.$cari["id_spt"] ?>" class="blue">No SPD : <?= $cari["no_spt"] ?>  <smal>tanggal:</smal> <?= LONGE_DATE_INDONESIA($cari["ttd_tgl"]) ?></a>
																				</h4>
																				</div>
																				<p><?= $cari["maksud"] ?></p>
																				<p>
																					<?= $this->m_dalam->get_data('m_anggaran','kode','id_anggaran', $cari["anggaran"]).' '.$this->m_dalam->get_data('m_anggaran','ket','id_anggaran', $cari["anggaran"])  ?><br/>
																					<?= $this->m_dalam->get_data('m_kegiatan','rekening','id_kegiatan', $cari["kegiatan_id"]).' '.$this->m_dalam->get_data('m_kegiatan','kegiatan','id_kegiatan', $cari["kegiatan_id"])  ?>
																				</p>
																				
																				<div class="search-actions text-center">
																				<?= $cari["nama"] ?><br>
																				<?= $cari["jabatan"] ?>
																				
																				
																				<a class="search-btn-action btn btn-sm btn-block btn-info">TAMPIL</a>
																				</div>
																				</div>
																				</div>
<?php endforeach ?>																																								