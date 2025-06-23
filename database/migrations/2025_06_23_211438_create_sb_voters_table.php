<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sbVoters', function (Blueprint $table) {

            $table->id();
            $table->string('voter_id')->nullable();
            $table->string('status')->nullable();
            $table->string('abbr')->nullable();
            $table->string('affidavit')->nullable();
            $table->string('last_voted')->nullable();
            $table->string('name_prefix')->nullable();
            $table->string('name_last')->nullable();
            $table->string('name_first')->nullable();
            $table->string('name_middle')->nullable();
            $table->string('name_suffix')->nullable();
            $table->string('house_number')->nullable();
            $table->string('house_fraction')->nullable();
            $table->string('pre_dir')->nullable();
            $table->string('street')->nullable();
            $table->string('type')->nullable();
            $table->string('post_dir')->nullable();
            $table->string('building_number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('precinct')->nullable();
            $table->string('portion')->nullable();
            $table->string('consolidation')->nullable();
            $table->string('alpha_split')->nullable();
            $table->string('party')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('image_id')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('military')->nullable();
            $table->string('gender')->nullable();
            $table->string('pav')->nullable();
            $table->string('source')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('care_of')->nullable();
            $table->string('mail_street')->nullable();
            $table->string('mail_city')->nullable();
            $table->string('mail_state')->nullable();
            $table->string('mail_zip')->nullable();
            $table->string('mail_country')->nullable();
            $table->string('ltd')->nullable();
            $table->string('language')->nullable();
            $table->string('drivers_license')->nullable();
            $table->string('email')->nullable();
            $table->string('reg_date_original')->nullable();
            $table->string('perm_category')->nullable();
            $table->string('confidential')->nullable();
            $table->string('idrequired')->nullable();
            $table->string('citizen')->nullable();
            $table->string('underage')->nullable();
            $table->string('precinct_name')->nullable();
            $table->string('res_addr_line1')->nullable();
            $table->string('res_addr_line2')->nullable();
            $table->string('res_addr_line3')->nullable();
            $table->string('01_09/14/2021_september_14,_2021,_california_gubernatorial_recall_election_4122')->nullable();
            $table->string('08_11/03/2020_2020_presidential_general_election_3958')->nullable();
            $table->string('14_03/03/2020_2020_presidential_primary_election_3957')->nullable();
            $table->string('15_11/05/2019_2019_consolidated_election_3944')->nullable();
            $table->string('19_08/27/2019_2019_consolidated_mail_ballot_election_3943')->nullable();
            $table->string('20_05/07/2019_city_of_san_bernardino_ward_3__3923')->nullable();
            $table->string('23_11/06/2018_2018_statewide_general_election_3787')->nullable();
            $table->string('24_06/05/2018_2018_statewide_primary_election_3784')->nullable();
            $table->string('25_11/07/2017_2017_consolidated_election_2751')->nullable();
            $table->string('26_08/29/2017_consolidated_mail_ballot_election_2725')->nullable();
            $table->string('27_07/11/2017_city_of_chino_special_election_2728')->nullable();
            $table->string('29_06/06/2017_special_municipal_election_2723')->nullable();
            $table->string('30_05/02/2017_sb_mountains_community_hd_special_mail_ballot_election_2715')->nullable();
            $table->string('32_03/07/2017_wrightwood_csd_special_formation_election_2677')->nullable();
            $table->string('33_11/08/2016_2016_presidential_general_election_2299')->nullable();
            $table->string('35_06/07/2016_2016_presidential_primary_election_1221')->nullable();
            $table->string('36_02/02/2016_february_2,_2016_elections_141')->nullable();
            $table->string('37_11/03/2015_2015_consolidated_election_139')->nullable();
            $table->string('38_09/01/2015_csa_70_p-6_(el_mirage)_special_district_election_140')->nullable();
            $table->string('39_08/25/2015_consolidated_mail_ballot_election_138')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sb_voters');
    }
};
