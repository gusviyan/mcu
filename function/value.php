<?php
// Nilai normal hemoglobin untuk Laki-Laki dan wanita
function getHemoglobinStatus($hemoglobin, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($hemoglobin >= 13.2 && $hemoglobin <= 17.2) {
            return "Normal";
        } elseif ($hemoglobin < 13.2) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($hemoglobin >= 11.7 && $hemoglobin <= 15.5) {
            return "Normal";
        } elseif ($hemoglobin < 12) {
            return "Low";
        } else {
            return "High";
        }
    }
}

// Nilai normal hematokrit untuk Laki-Laki dan wanita
function getHematokritStatus($hematokrit, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($hematokrit >= 40 && $hematokrit <= 52) {
            return "Normal";
        } elseif ($hematokrit < 40) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($hematokrit >= 35 && $hematokrit <= 47) {
            return "Normal";
        } elseif ($hematokrit< 35) {
            return "Low";
        } else {
            return "High";
        }
    }
}

// Nilai normal trombosit
function getTrombositStatus($trombosit) {
    if($trombosit >= 150 && $trombosit <= 440){
        return "Normal";
    } elseif ($trombosit <150){
        return "Low";
    } else {
        return "High";
    }
    
}

// Nilai normal leukosit
function getLeukositStatus($leukosit) {
    if($leukosit >= 5 && $leukosit <= 10){
        return "Normal";
    } elseif ($leukosit <50){
        return "Low";
    } else {
        return "High";
    }
    
}

// Nilai normal LED untuk Laki-Laki dan wanita
function getLedStatus($led, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($led >= 0 && $led <= 10) {
            return "Normal";
        } elseif ($led < 0) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($led >= 0 && $led <= 20) {
            return "Normal";
        } elseif ($led < 0) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Basofil
function getBasofilStatus($basofil) {
    if($basofil >= 0 && $basofil <= 1){
        return "Normal";
    } elseif ($basofil <0){
        return "Low";
    } else {
        return "High";
    }
    
}

//Eosinofil
function getEosinofilStatus($eosinofil) {
    if($eosinofil >= 1 && $eosinofil <= 3){
        return "Normal";
    } elseif ($eosinofil <1){
        return "Low";
    } else {
        return "High";
    }
    
}


//Neutrofil
function getNeutrofilStatus($neutrofil) {
    if($neutrofil >= 50 && $neutrofil <= 70){
        return "Normal";
    } elseif ($neutrofil <50){
        return "Low";
    } else {
        return "High";
    }
    
}

//Limfosit
function getLimfositStatus($limfosit) {
    if($limfosit >= 25 && $limfosit <= 40){
        return "Normal";
    } elseif ($limfosit <25){
        return "Low";
    } else {
        return "High";
    }
    
}

//Monosit
function getMonositStatus($monosit) {
    if($monosit >= 2 && $monosit <= 8){
        return "Normal";
    } elseif ($monosit <2){
        return "Low";
    } else {
        return "High";
    }
    
}


// Nilai normal eritrosit untuk Laki-Laki dan wanita
function getEritrositStatus($eritrosit, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($eritrosit >= 4.4 && $eritrosit <= 5.9) {
            return "Normal";
        } elseif ($eritrosit < 4.4) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($eritrosit >= 3.8 && $eritrosit <= 5.2) {
            return "Normal";
        } elseif ($eritrosit< 3.8) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//MCV
function getMCVStatus($mcv) {
    if($mcv >= 80 && $mcv <= 100){
        return "Normal";
    } elseif ($mcv <80){
        return "Low";
    } else {
        return "High";
    }
    
}

//MCH
function getMCHStatus($mch) {
    if($mch >= 26 && $mch <= 34){
        return "Normal";
    } elseif ($mch <26){
        return "Low";
    } else {
        return "High";
    }
    
}

//MCHC
function getMCHCStatus($mchc) {
    if($mchc >= 32 && $mchc <= 36){
        return "Normal";
    } elseif ($mchc <32){
        return "Low";
    } else {
        return "High";
    }
    
}

//RDW
function getRDWStatus($rdw) {
    if($rdw >= 1.5 && $rdw <= 14.5){
        return "Normal";
    } elseif ($rdw <1.5){
        return "Low";
    } else {
        return "High";
    }
    
}

//SGOT
function getSGOTStatus($sgot, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($sgot >= 0 && $sgot <= 50) {
            return "Normal";
        } elseif ($sgot < 0) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($sgot >= 0 && $sgot <= 35) {
            return "Normal";
        } elseif ($sgot < 0) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//SGPT
function getSGPTStatus($sgpt, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($sgpt >= 0 && $sgpt <= 50) {
            return "Normal";
        } elseif ($sgpt < 0) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($sgpt >= 0 && $sgpt <= 35) {
            return "Normal";
        } elseif ($sgpt < 0) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Kolesterol
function getKolesterolStatus($kolesterol) {
    if($kolesterol >= 70 && $kolesterol <= 200){
        return "Normal";
    } elseif ($kolesterol <70){
        return "Low";
    } else {
        return "High";
    }
    
}

//HDL
function getHDLStatus($hdl, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($hdl >= 31 && $hdl <= 63) {
            return "Normal";
        } elseif ($hdl < 0) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($hdl >= 37 && $hdl <= 92) {
            return "Normal";
        } elseif ($hdl < 37) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//LDL
function getLDLStatus($ldl) {
    if ($ldl <= 130) {
        return "Normal";
    } else {
        return "High";
    }
}

//TG
function getTGStatus($tg) {
    if ($tg <= 150) {
        return "Normal";
    } else {
        return "High";
    }
}


//Asam Urat
function getAsamuratStatus($asam_urat, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($asam_urat >= 2.5 && $asam_urat <= 7) {
            return "Normal";
        } elseif ($asam_urat < 2.5) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($asam_urat >= 1.5 && $asam_urat <= 7) {
            return "Normal";
        } elseif ($asam_urat < 1.5) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Ureum
function getUreumStatus($ureum, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($ureum >= 20 && $ureum <= 40) {
            return "Normal";
        } elseif ($ureum < 20) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($ureum >= 20 && $ureum <= 40) {
            return "Normal";
        } elseif ($ureum < 20) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Creatin
function getCreatinStatus($creatin, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($creatin >= 0.6 && $creatin <= 1.5) {
            return "Normal";
        } elseif ($creatin < 0.6) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($creatin >= 0.6 && $creatin <= 1.5) {
            return "Normal";
        } elseif ($creatin < 0.6) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Kimia Urin
//Berat Jenis
function getBeratjenisStatus($beratjenis) {
    if($beratjenis >= 1003 && $beratjenis <= 1030){
        return "Normal";
    } elseif ($beratjenis <1003){
        return "Low";
    } else {
        return "High";
    }
    
}

//pH
function getPHStatus($ph) {
    if($ph >= 4.8 && $ph <= 7.4){
        return "Normal";
    } elseif ($ph <4.8){
        return "Low";
    } else {
        return "High";
    }
    
}

//protein
function getProteinStatus($protein) {
    if($protein == "Negatif" || $protein == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}


//Bilirubin
function getBilirubinStatus($bilirubin) {
    if($bilirubin == "Negatif" || $bilirubin == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//keton
function getKetonStatus($keton) {
    if($keton == "Negatif" || $keton == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//Urobilinogen
function getUrobilinogenStatus($urobilinogen) {
    if($urobilinogen <= 0.1){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//darahurin
function getDarahurinStatus($darahurin) {
    if($darahurin == "Negatif" || $darahurin == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//darahurin


//glukosa urin
function getglucosaurinStatus($glucosaurin) {
    if($glucosaurin == "Negatif" || $glucosaurin == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//nitrit
function getNitritStatus($nitrit) {
    if($nitrit == "Negatif" || $nitrit == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}

//Sedimen Urin
//Epitel
function getEpitelStatus($epitel) {
    if($epitel == "Positif" || $epitel == "positif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Eritrositurin

function getEritrositsedimenStatus($eritrositsedimen) {
    if($eritrositsedimen >= 0 && $eritrositsedimen <= 2){
        return "Normal";
        } elseif($eritrositsedimen < 0){
        return "Low";
    } else {
        return "High";
    }
    
}

//Leukositurin
function getLeukositurinStatus($leukositurin) {
    if($leukositurin == "Negatif" || $leukositurin == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}
function getLeukositsedimenStatus($leukositsedimen) {
    if($leukositsedimen == "Negatif" || $leukositsedimen == "negatif"){
        return "Normal";
    } else {
        return "ALERT!";
    }
    
}
//Silinder Urin
function getSilinderurinStatus($silinderurin) {
    if($silinderurin == "Negatif" || $silinderurin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Kristal Urin
function getKristalurinStatus($kristalurin) {
    if($kristalurin == "Negatif" || $kristalurin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Bakteri Urin
function getBakteriurinStatus($bakteriurin) {
    if($bakteriurin == "Negatif" || $bakteriurin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Lain-lain
function getlainStatus($lain) {
    if($lain == "Negatif" || $lain == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Glucosa Puasa
function getGlucosapuasaStatus($glucosa_puasa, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($glucosa_puasa >= 80 && $glucosa_puasa <= 100) {
            return "Normal";
        } elseif ($glucosa_puasa < 80) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($glucosa_puasa >= 80 && $glucosa_puasa <= 100) {
            return "Normal";
        } elseif ($glucosa_puasa < 80) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//Glucosa 2 jam
function getGlucosappStatus($glucosa_pp, $jenis_kelamin) {
    if ($jenis_kelamin == 'Laki-Laki') {
        if ($glucosa_pp >= 80 && $glucosa_pp <= 140) {
            return "Normal";
        } elseif ($glucosa_pp < 80) {
            return "Low";
        } else {
            return "High";
        }
    } else {
        if ($glucosa_pp >= 80 && $glucosa_pp <= 140) {
            return "Normal";
        } elseif ($glucosa_pp < 80) {
            return "Low";
        } else {
            return "High";
        }
    }
}

//GDS
function getGDSStatus($gds) {
    if($gds >= 70 && $gds <= 140){
        return "Normal";
    } elseif ($gds <70){
        return "Low";
    } else {
        return "High";
    }
    
}

//HBSAG
function getHBSAGStatus($hbsag) {
    if($hbsag == "Non Reaktif" || $hbsag == "non reaktif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Urinalisa Makroskopik
function getWarnaStatus($warna) {
    if ($warna == "Kuning" || $warna == "kuning") {
        return "Normal";
    } else {
        return "ALERT!";
    }
}

//Urinalisa Makroskopik
function getKejernihanStatus($kejernihan) {
    if ($kejernihan == "Jernih" || $kejernihan == "jernih") {
        return "Normal";
    } else {
        return "ALERT!";
    }
}

//NAPZA
//Amfetamin
function getAmpfetaminStatus($amfetamin) {
    if($amfetamin == "Negatif" || $amfetamin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Amfetamin
function getMetamfetaminStatus($metamfetamin) {
    if($metamfetamin == "Negatif" || $metamfetamin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Canabis
function getThcStatus($thc) {
    if($thc == "Negatif" || $thc == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Morfin
function getMorfinStatus($morfin) {
    if($morfin == "Negatif" || $morfin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Kokain
function getKokainStatus($kokain) {
    if($kokain == "Negatif" || $kokain == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}

//Benzo
function getBenzodiazepinStatus($benzodiazepin) {
    if($benzodiazepin == "Negatif" || $benzodiazepin == "negatif"){
        return "";
    } else {
        return "ALERT!";
    }
    
}
?>