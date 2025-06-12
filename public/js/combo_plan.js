$(document).ready(function(){
    
    // Submit form
    $("#planForm").on('submit', function(e){

        e.preventDefault();

        $.ajax({
            url : '/combo-plan/save',
            type : 'POST',
            data : $('#planForm').serialize(),
            success:function(res) {
                if( res.success ) {
                    toastr.success(res.message);
                    $("#planForm")[0].reset();
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

    // Edit Plan
    $(".editPlan").on('click', function(){

        var combo_plan_id = $(this).data('id');
        
        $.ajax({
            url : '/combo-plan/details',
            type : 'POST',
            data : {'combo_plan_id' : combo_plan_id, _token : $('input[name="_token"]').val()},
            success:function(res) {
                if( res.success ) {
                    $("#combo_plan_id").val(res.data.id);
                    $("#name").val(res.data.name);
                    $("#price").val(res.data.price);
                    $("#title-tag").text('Edit Combo Plan');
                    $("#btn-tag").text('Update Combo Plan');
                    $("[name='plan_ids[]']").val(res.data.plans.map(p => p.id)).trigger('change');
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

    // Delete Plan
    $(".deletePlan").on('click', function(){

        if( ! confirm('Are you sure to delete?' ) ) {
            return;
        }

        var combo_plan_id = $(this).data('id');
        
        $.ajax({
            url : '/combo-plan/delete',
            type : 'POST',
            data : {'combo_plan_id' : combo_plan_id, _token : $('input[name="_token"]').val()},
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

