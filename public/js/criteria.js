$(document).ready(function(){
    
    // Submit form
    $("#criteriaForm").on('submit', function(e){

        e.preventDefault();

        $.ajax({
            url : '/criteria/save',
            type : 'POST',
            data : $('#criteriaForm').serialize(),
            success:function(res) {
                if( res.success ) {
                    toastr.success(res.message);
                    $("#criteriaForm")[0].reset();
                    setTimeout(() => location.reload(), 1000 );
                } else {
                    toastr.error(res.message);
                }
            },
            error:function(res) {
                toastr.error(res.message);
            }
        })
    });

    // Edit Criteria
    $(".editCriteria").on('click', function(){

        var criteria_id = $(this).data('id');
        
        $.ajax({
            url : '/criteria/details',
            type : 'POST',
            data : {'criteria_id' : criteria_id, _token : $('input[name="_token"]').val()},
            success:function(res) {
                if( res.success ) {
                    $("#criteria_id").val(res.data.id);
                    $("#name").val(res.data.name);
                    $("#age_less_than").val(res.data.age_less_than);
                    $("#age_greater_than").val(res.data.age_greater_than);
                    $("#last_login_days_ago").val(res.data.last_login_days_ago);
                    $("#income_less_than").val(res.data.income_less_than);
                    $("#income_greater_than").val(res.data.income_greater_than);
                    $("#title-tag").text('Edit Eligibility Criteria');
                    $("#btn-tag").text('Update Criteria');
                    $("html, body").animate({ scrollTop: 0 }, "fast");
                } else {
                    toastr.error(res.message);
                }
            },
            error:function(res) {
                toastr.error(res.message);
            }
        })
    });

    // Delete Criteria
    $(".deleteCriteria").on('click', function(){

        if( ! confirm('Are you sure to delete?' ) ) {
            return;
        }

        var criteria_id = $(this).data('id');
        
        $.ajax({
            url : '/criteria/delete',
            type : 'POST',
            data : {'criteria_id' : criteria_id, _token : $('input[name="_token"]').val()},
            success:function(res) {
                if( res.success ) {
                    toastr.success(res.message);
                    setTimeout(() => location.reload(), 1000 );
                } else {
                    toastr.error(res.message);
                }
            },
            error:function(res) {
                toastr.error(res.message);
            }
        })
    });

});

