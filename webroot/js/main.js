$(function() {

    $('.dropdown-menu.lang ul.chosen-results').click(function() {
        resetTopNav();
    });

    if ($('form div.input').length > 0) {
        $('form div.input').wrap("<div class='form-group'></div>");
        $('form div.input input').addClass('form-control');
        $('form div.input select').addClass('form-control');
    }

    $('[data-toggle="tooltip"]').tooltip();

    if ($('.error-message').length > 0) {
        $('.error-message').parent().parent().addClass('has-warning');
    }

    if ($('.alert').length && $('.container-fluid > div.actions').length) {
        $('.alert').insertAfter($('.container-fluid > div.actions'));
    }

    $('input[type=number]').each(function() {
        $(this).addClass('no_spinners');
    });

    $('input[type=number]').focus(function() {
        $(this).removeClass('no_spinners');
    });

    $('input[type=number]').blur(function() {
        $(this).addClass('no_spinners');
    });

});

function languageChange() {
    var select_lang = $('select[name="language"] option:selected').val();
    $('#language_form').submit();
}

function resetTopNav() {
    $('ul.top-nav li').removeClass('open');
}

function setMenuActive(controller) {
    $('nav.navbar ul li').removeClass('active');
    var tables = ['AccountCommon', 'Roledata', 'Family', 'Guild', 'City', 'CommerceRank', 'PetData'];
    if (tables.indexOf(controller) != -1) {
        $('nav.navbar ul#tables').addClass('in');
    }

    var equipment = ['Equipment'];
    if (equipment.indexOf(controller) != -1) {
        $('nav.navbar ul#equipment').addClass('in');
    }

    var reports = ['LoginLog'];
    if (reports.indexOf(controller) != -1) {
        $('nav.navbar ul#reports').addClass('in');
    }
    $('nav.navbar ul li[data-controller="'+controller+'"]').addClass('active');
}

function findOwners() {
    $('#find_results').hide();
    $('#find_results').empty();
    var serialNum = $('#serialNum').val();
    if (!serialNum.length) {
        alert('Serial Number cannot be empty! Try again.');
        return;
    }

    var select_lang = $('select[name="language"] option:selected').val();
    $('.find_progress').css('display', 'inline-block');
    $.get('/' + select_lang + '/Equipment/find?serialNum='+serialNum, function(data){
        $('#find_results').html(data);
        $('#find_results').show();
        $('.find_progress').hide();
    });
}

function getAccountLog() {
    var accountID = $('#accountID').val();
    $('#login_log').hide();
    $('#login_log').empty();

    if (accountID == 0) {
        alert('Please select one existing Account');
        return;
    }

    var select_lang = $('select[name="language"] option:selected').val();
    $.get('/' + select_lang + '/LoginLog/accountLog?accountID='+accountID, function(data) {
        $('#login_log').html(data);
        $('#login_log').show();
    });
}

function initEquipment(roledataAccountsList) {
    $('table.equip select#equipType').change(function(){
        var select_lang = $('select[name="language"] option:selected').val();
        var id = $('input[name=roleID]').val();
        var slug = $(this).val();
        location.href = '/' + select_lang + '/Roledata/equipment_item/'+ id + '/' + slug;
    });

    //$('#equipType').chosen();

    $('.copy_item').click(function(){
        $('input[name=serial]').val($(this).data('serial'));
        $('input[name=typeID]').val($(this).data('typeid'));
        $('select[name=account]').val(0);
        $('select[name=roledata]').val(0);
        $('input[name=count]').val(1);
    });

    $('select[name=account]').change(function(){
        initAccountRoledataList($(this).val(), roledataAccountsList);
    });
}

function initAccountRoledataList(accountID, roledataAccountsList) {
    var originalRoleId = $('input[name=originalRoleId]').val();
    $('select[name=roledata]').empty().append('<option selected="selected" value="0">'+$('input[name=empty_option]').val()+'</option>');
    for(var i=0; i<roledataAccountsList[accountID].length; i++) {
        var className = '';
        if (roledataAccountsList[accountID][i].RoleID == originalRoleId) {
            className = 'current';
        }
        $('select[name=roledata]').append('<option class="'+className+'" value="'+roledataAccountsList[accountID][i].RoleID+'">'+roledataAccountsList[accountID][i].RoleName+'</option>')
    }
}

function addEquipment() {
    var originalRoleId = $('input[name=originalRoleId]').val();
    var serialNum = $('input[name=serial]').val();
    var typeID = $('input[name=typeID]').val();
    var accountID = $('select[name=account]').val();
    var roleID = $('select[name=roledata]').val();
    var count = $('input[name=count]').val();
    var select_lang = $('select[name="language"] option:selected').val();
    $.post('/' + select_lang + '/Equipment/addRoledataEquipment', {serial: serialNum, typeID: typeID, accountID: accountID, roleID: roleID, count: count}, function(data) {
        var result = JSON.parse(data);
        alert('Equipment with SerialNum #'+ result.SerialNum +' appended to RoleID# '+roleID);
        if (roleID == originalRoleId) {
            window.location.reload();
        }
    });
}

function initMembers(roledataAccountsList) {
    $('select[name=account]').change(function(){
        initAccountRoledataList($(this).val(), roledataAccountsList);
    });
}

function addMembers(controller) {
    var roleID = $('select[name=roledata]').val();
    if (roleID == 0) {
        alert('Please select roledata to assign!');
        return;
    }
    var select_lang = $('select[name="language"] option:selected').val();

    if (controller == 'Family') {
        var familyID = $('input[name=familyID]').val();
        $.post('/' + select_lang + '/Family/addFamilyMember', {familyID: familyID, roleID: roleID}, function(result) {
            if (result == 1) {
                alert('Member already in family'); return;
            }
            if (result == 2) {
                alert('Family is full. Cannot add members'); return;
            }
            if (result == 0) {
                window.location.reload();
            }
            if (result == 3) {
                alert('This roleID ' +roleID+ ' already has a family'); return;
            }

        });
    } else {
        if (controller == 'Guild') {
            var guilID = $('input[name=guildID]').val();
            $.post('/' + select_lang + '/Guild/addGuildMember', {guildID: guilID, roleID: roleID}, function(result) {
                window.location.reload();
            });
        }
    }
}

function uploadActions() {
    $('li#actions').hide();
    if ($('div.actions ul.side-nav').length > 0) {
        $('div.actions ul.side-nav').children().clone().appendTo('li#actions ul.dropdown-menu');
        $('li#actions').show();
    }
}

function highlightSearchItems(searchStr) {
    $('div.search_item > span, div.search_item a.search_link').each(function(){
        var itemText = $(this).html();
        var reg = new RegExp(searchStr, "gi");
        var highlighted = itemText.replace(reg, '<span class="highlight">$&</span>');
        $(this).html(highlighted);
    });
}
