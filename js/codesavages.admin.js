$(function () {
  let mediaUploader;
  $('#upload-button').on('click', function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload a profile picture',
      button: {
        text: 'Upload picture'
      },
      multiple: false
    });
    mediaUploader.on('select', function () {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
      $('#replace-profile-picture').css('background-image', 'url(' + attachment.url + ')');
    });
    mediaUploader.open();
  });

  $('#remove-picture').on('click', function (e) {
    e.preventDefault();
    const answer = confirm("Are you sure you want to remove your Profil picture?");
    if (answer) {
      $('#profile-picture').val('');
      $('.codesavages-general-form').submit();
    }
    return;
  });
});