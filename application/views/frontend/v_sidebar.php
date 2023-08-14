<div class="widget-sidebar sidebar-search">
  <h5 class="sidebar-title">Search</h5>
  <div class="sidebar-content">
    <?php echo form_open(base_url().'search'); ?>
    <div class="input-group">
      <input type="text" class="form-control" name="cari" placeholder="Search for..." aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-secondary btn-search" type="submit">
          <span class="ion-android-search"></span>
        </button>
      </span>
    </div>
  </form>
</div>
</div>
<div class="widget-sidebar">
  <h5 class="sidebar-title">Artikel Terbaru</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php 
      $artikel = $this->db->query("SELECT * FROM artikel,pengguna,dbsuratmasuk_riska WHERE artikel_status='publish' AND artikel_author=pengguna_id AND artikel_kategori=id_surat ORDER BY artikel_id DESC LIMIT 3")->result();
      foreach($artikel as $a){
        ?>
        <li>
          <a href="<?php echo base_url().$a->artikel_slug; ?>"><?php echo $a->artikel_judul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>
<div class="widget-sidebar">
  <h5 class="sidebar-title">Halaman</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php 
      $halaman = $this->m_data->get_data('halaman')->result();
      foreach($halaman as $h){
        ?>
        <li>
          <a href="<?php echo base_url().'page/'.$h->halaman_slug; ?>"><?php echo $h->halaman_judul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>
<div class="widget-sidebar widget-tags">
  <h5 class="sidebar-title">Surat Masuk</h5>
  <div class="sidebar-content">
    <ul>
      <?php 
      $dbsuratmasuk_riska = $this->m_data->get_data('dbsuratmasuk_riska')->result();
      foreach($dbsuratmasuk_riska as $k){
        ?>
        <li>
          <a href="<?php echo base_url().'dbsuratmasuk_riska/'.$k->kategori_slug; ?>"><?php echo $k->pengirim; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>