$(document).ready(function () {
  // Get Regencies
  $('#province').change(function () {
    var provinceId = $(this).val();
    var name = $('#name').val();
    $.ajax({
      url: 'http://localhost/eproc/handler/region/get_regencies.php',
      type: 'GET',
      data: {
        province: provinceId,
        name: name
      },
      success: function (response) {
        $('#regency').html(response);
        $('#district').html('<option value="">Pilih Kecamatan</option>');
        $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
      }
    });
  });

  // Get Districts
  $('#regency').change(function () {
    var regencyId = $(this).val();
    var name = $('#name').val();
    var provinceId = $('#province').val();
    $.ajax({
      url: 'http://localhost/eproc/handler/region/get_districts.php',
      type: 'GET',
      data: {
        regency: regencyId,
        name: name,
        province: provinceId
      },
      success: function (response) {
        $('#district').html(response);
        $('#village').html('<option value="">Pilih Kelurahan/Desa</option>');
      }
    });
  });

  // Get Villages
  $('#district').change(function () {
    var districtId = $(this).val();
    var name = $('#name').val();
    var provinceId = $('#province').val();
    var regencyId = $('#regency').val();
    $.ajax({
      url: 'http://localhost/eproc/handler/region/get_villages.php',
      type: 'GET',
      data: {
        district: districtId,
        name: name,
        province: provinceId,
        regency: regencyId
      },
      success: function (response) {
        $('#village').html(response);
      }
    });
  });
});