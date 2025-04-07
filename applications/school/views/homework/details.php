<?php $this->view('header'); ?>
<div class="loader hidden">
  <img src="<?php echo base_url('assets/gif/giphy.gif') ?>" alt="Loading..." />
  <span class="loader-message" id="loader-message">Loading...</span>
</div>

<div class="col-md-12 innerview">
  <div class="col-md-12">
    <form id="homework-form" method="POST" action="<?php echo site_url('homework/submit'); ?>" enctype="multipart/form-data">
      <div class="col-md-4">
        <input type="hidden" name="class" value="<?php echo $class; ?>" />

        <p class="details">Subject</p>
        <select name="subject" class="form-select">
          <?php foreach ($subjects as $row): ?>
            <option value="<?php echo $row->Subjectname; ?>"><?php echo $row->Subjectname; ?></option>
          <?php endforeach; ?>
        </select>

        <p class="details">Homework</p>
        <textarea name="assignment" class="message-input-box"></textarea>
        <?php if (form_error('assignment')): ?>
          <div class="invalid-bar"><i class="las la-exclamation-triangle"></i> <?php echo form_error('assignment'); ?></div>
        <?php endif; ?>

        <p class="details">File</p>
        <input type="file" name="file" id="file" class="form-input" />
      </div>

      <div class="col-md-12">
        <button type="submit" class="form-submit">Add Homework</button>
      </div>
    </form>
  </div>
</div>

<script>
  const form = document.getElementById("homework-form");
  form.addEventListener("submit", () => {
    document.querySelector(".loader").classList.remove("hidden");
    document.getElementById("loader-message").innerText = "Uploading File & Submitting Homework...";
  });
</script>

<?php $this->view('footer'); ?>
