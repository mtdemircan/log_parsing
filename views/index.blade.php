<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" id="tab1" onclick="listModify()" href="#listModify" data-toggle="tab">
        {{__('dsdb_audit modify log bilgileri')}}</a>       
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab2" onclick="listAdd()" href="#listAdd" data-toggle="tab">
        {{__('dsdb_audit add log bilgileri')}}</a>       
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab3" onclick="listDelete()" href="#listDelete" data-toggle="tab">
        {{__('dsdb_audit delete log bilgileri')}}</a>       
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab4" onclick="listAuth()" href="#listAuth" data-toggle="tab">
        {{__('auth')}}</a>       
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab5" onclick="listLogs()" href="#listLogs" data-toggle="tab">
        {{__('logs')}}</a>       
    </li>
</ul>

<div class="tab-content">

    <div id="listModify" class="tab-pane active">
        <div class="table-responsive" id="listModify"></div>
    </div>

    <div id="listAdd" class="tab-pane">
        <div class="table-responsive" id="listAdd"></div>
    </div>

    <div id="listDelete" class="tab-pane">
        <div class="table-responsive" id="listDelete"></div>
    </div>
    <div id="listAuth" class="tab-pane">
        <div class="table-responsive" id="listAuth"></div>
    </div>
    <div id="listLogs" class="tab-pane">
        <div class="table-responsive" id="listLogs"></div>
    </div>
    
</div>

<script>
    if(location.hash === ""){
        listModify();
    }
    function listModify(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_modify'), form, function(response) {
                        $('#listModify').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
    function listAdd(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_add'), form, function(response) {
                        $('#listAdd').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
    function listDelete(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_delete'), form, function(response) {
                        $('#listDelete').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
    function listAuth(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_auth'), form, function(response) {
                        $('#listAuth').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
    function listLogs(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_logs'), form, function(response) {
                        $('#listLogs').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
</script>