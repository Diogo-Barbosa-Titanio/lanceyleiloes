<div class="container-fluid">

    <!-- Page Heading -->
    {{$title}}


    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{$helper}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">

                    {{$slot}}

                </table>
            </div>
        </div>
    </div>

</div>
