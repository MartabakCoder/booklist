    var lastId = 0;
    var bukuWrapper = document.getElementById("buku_wrapper");
    var boolBtn = document.getElementById("TombolSimpan")==null?false:true;
    var btnSave = document.getElementById("TombolSimpan");
    var removeIcon;
    var updateIcon;
    var bukuList;
    var modal = document.getElementById("ModalTambah");  
    var modalDetail = document.getElementById("ModalDetail");    
    
    var spanDetail = document.getElementsByClassName("close")[0];
    
    
    spanDetail.onclick = function() {
      modalDetail.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == modalDetail) {
          modalDetail.style.display = "none";
        }
    }

    //untuk load awal
    function init() {

      if (!!(window.localStorage.getItem('bukuList'))) {
        bukuList = JSON.parse(window.localStorage.getItem('bukuList'));
      } else {
        bukuList = [];
      }
      if(boolBtn == true){
        btnSave.addEventListener('click', savebuku);
      }
      showList();
    }
    //untuk show detail
    function opendetail(param) {
      modalDetail.style.display = "block";
      document.getElementById("judulBukuDetail").innerHTML = bukuList[param].bukuJudul
      document.getElementById("penulisBukuDetail").innerHTML = bukuList[param].bukuPenulis
      document.getElementById("deskripsiBukuDetail").innerHTML = bukuList[param].bukuDes
    }
    //untuk melihat list
    function showList() {
      if (!!bukuList.length) {
        getLastbukuId();
        for (var item in bukuList) {
          var buku = bukuList[item];
          addbukuToList(buku);
        }
      }
      
    }

    //function menyimpan
    function savebuku(event) {

      var buku = {
        bukuId: lastId,
        bukuDes: document.getElementById("tdeskripsi").value,
        bukuJudul: document.getElementById("tbuku").value,
        bukuPenulis: document.getElementById("tpenulis").value
      };
      if(buku.bukuDes == ""&&buku.bukuJudul == ""&&buku.bukuPenulis == ""){
          alert("Lengkapi data anda")
      }else{
        bukuList.push(buku);
        syncbuku();
        addbukuToList(buku);
        lastId++;
        modal.style.display = "none";
      }
      
    }

    //menambahkan buku yang sudah di load ke bentuk html
    function addbukuToList(buku) {
      bukuWrapper.innerHTML += 
          '<div class="grid-item" onclick="opendetail('+buku.bukuId+')"><div class="card"><img src="src/img/overhead-view-stationeries-laptop-beige-background.jpg" alt="Avatar" style="width:100%"><div class="container"><h4><b>'+buku.bukuJudul+'</b></h4><p>'+buku.bukuPenulis+'</p></div></div></div>';
    }

    //untuk memperbarui hal yang baru saha di update
    function syncbuku() {
      window.localStorage.setItem('bukuList', JSON.stringify(bukuList));
      bukuList = JSON.parse(window.localStorage.getItem('bukuList'));
    }

    //untuk membuat parameter id pada array
    function getLastbukuId() {
      var lastbuku = bukuList[bukuList.length - 1];
      lastId = lastbuku.bukuId + 1;
    }

    init();