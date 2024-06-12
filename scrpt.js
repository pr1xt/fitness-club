function add_client(){
    document.getElementById("add_client_block").style.display = "inline";
    document.getElementById("add_instr_block").style.display = "none";
    document.getElementById("add_train_block").style.display = "none";
    document.getElementById("week_rep_block").style.display = "none";
    document.getElementById("mon_rep_block").style.display = "none";
}
function add_ins(){
    document.getElementById("add_client_block").style.display = "none";
    document.getElementById("add_instr_block").style.display = "inline";
    document.getElementById("add_train_block").style.display = "none";
    document.getElementById("week_rep_block").style.display = "none";
    document.getElementById("mon_rep_block").style.display = "none";
}
function add_trn(){
    document.getElementById("add_client_block").style.display = "none";
    document.getElementById("add_instr_block").style.display = "none";
    document.getElementById("mon_rep_block").style.display = "none";
    document.getElementById("add_train_block").style.display = "inline";
    document.getElementById("week_rep_block").style.display = "none";
}function week_rep(){
    document.getElementById("add_client_block").style.display = "none";
    document.getElementById("add_instr_block").style.display = "none";
    document.getElementById("add_train_block").style.display = "none";
    document.getElementById("mon_rep_block").style.display = "none";
    document.getElementById("week_rep_block").style.display = "inline";
}function mon_rep(){
    document.getElementById("add_client_block").style.display = "none";
    document.getElementById("add_instr_block").style.display = "none";
    document.getElementById("add_train_block").style.display = "none";
    document.getElementById("week_rep_block").style.display = "none";
    document.getElementById("mon_rep_block").style.display = "inline";
}