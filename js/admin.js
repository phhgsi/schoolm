
    // Staff management
    function getRolesForStaff(academicYearId) {
        $.ajax({
            url: '../api/get_roles.php', // You need to create this API endpoint
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var roleSelect = $('#staff-role-select');
                roleSelect.empty();
                $.each(data, function(index, role) {
                    roleSelect.append('<option value="' + role.id + '">' + role.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching roles:', error);
            }
        });
    }

    function getStaff(academicYearId) {
        $.ajax({
            url: '../api/get_staff.php',
            type: 'GET',
            dataType: 'json',
            data: { academic_year_id: academicYearId },
            success: function(data) {
                var staffTableBody = $('#staff-table-body');
                staffTableBody.empty();
                $.each(data, function(index, staff) {
                    staffTableBody.append('
                        <tr>
                            <td class="py-2 px-4 border-b">' + staff.name + '</td>
                            <td class="py-2 px-4 border-b">' + staff.role_name + '</td>
                            <td class="py-2 px-4 border-b">' + staff.email + '</td>
                            <td class="py-2 px-4 border-b">' + staff.phone + '</td>
                            <td class="py-2 px-4 border-b">
                                <button data-id="' + staff.id + '" data-name="' + staff.name + '" data-role-id="' + staff.role_id + '" data-email="' + staff.email + '" data-phone="' + staff.phone + '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded edit-staff">Edit</button>
                                <button data-id="' + staff.id + '" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded delete-staff">Delete</button>
                            </td>
                        </tr>
                    ');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching staff:', error);
            }
        });
    }

    if ($('#staff-table-body').length) {
        getRolesForStaff($('#academic-year-select').val());
        getStaff($('#academic-year-select').val());
        $('#academic-year-select').change(function() {
            getStaff($(this).val());
        });
    }

    $('#add-staff-form').submit(function(e) {
        e.preventDefault();
        var academicYearId = $('#academic-year-select').val();
        var staffId = $('#staff-id').val();
        var name = $('#staff-name').val();
        var roleId = $('#staff-role-select').val();
        var email = $('#staff-email').val();
        var phone = $('#staff-phone').val();

        var url = staffId ? '../api/update_staff.php' : '../api/add_staff.php';
        var data = {
            academic_year_id: academicYearId,
            staff_id: staffId,
            name: name,
            role_id: roleId,
            email: email,
            phone: phone
        };

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                if (data.success) {
                    $('#add-staff-form')[0].reset();
                    $('#staff-id').val('');
                    getStaff(academicYearId);
                } else {
                    alert(data.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error saving staff:', error);
            }
        });
    });

    $(document).on('click', '.edit-staff', function() {
        $('#staff-id').val($(this).data('id'));
        $('#staff-name').val($(this).data('name'));
        $('#staff-role-select').val($(this).data('role-id'));
        $('#staff-email').val($(this).data('email'));
        $('#staff-phone').val($(this).data('phone'));
    });

    $('#cancel-edit-staff').click(function() {
        $('#add-staff-form')[0].reset();
        $('#staff-id').val('');
    });

    $(document).on('click', '.delete-staff', function() {
        var staffId = $(this).data('id');
        var academicYearId = $('#academic-year-select').val();

        if (confirm('Are you sure you want to delete this staff member?')) {
            $.ajax({
                url: '../api/delete_staff.php',
                type: 'POST',
                dataType: 'json',
                data: { staff_id: staffId },
                success: function(data) {
                    if (data.success) {
                        getStaff(academicYearId);
                    } else {
                        alert(data.error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting staff:', error);
                }
            });
        }
    });
