#!/bin/bash

PASSWORD="--password=";
ROOT_DATABASE="mysql";
LSNT_DATABASE="lsnt";
LSNT_TEST_DATABASE="lsnt_test";
CURRENT_DATABASE=$LSNT_DATABASE;
STEP_COUNTER=1;

incStep() {
    ((STEP_COUNTER++))
}

#Insert New Tables
executeDBStatement() {
    executeDBStatementExtended $1 $CURRENT_DATABASE
}

executeMySQLStatement() {
    executeDBStatementExtended $1 $ROOT_DATABASE
}

executeDBStatementExtended() {
    DB_FILE="./dbScripts/$1";
    DB=$2;
    echo "Executing: $DB_FILE in $DB";
    if [[ "$LOCAL_DB" == "Y" ]]
    then
        mysql -u root $DB $PASSWORD$MYSQL_ROOT_PASSWORD < $DB_FILE
    else
        printf "\n\nThis is not finished\n\n";
        #mysql -u <prod_user> $LSNT_DATABASE -h <prod_host> $PASSWORD$MYSQL_ROOT_PASSWORD < $DB_FILE
    fi
}

cleanInstallation() {
    printf "\nSTEP $STEP_COUNTER: Is this a clean database installation?\n";
    echo -n "Clean DB Installation? (Y\n) [ENTER]: "; 
    read CLEAN_DB_INSTALLATION;
    incStep
}

archiveDatabase() {
    printf "\nSTEP $STEP_COUNTER: Do you want to archive the 'LSNT' database?\n";
    echo -n "Archive DB? (Y\n) [ENTER]: "; 
    read ARCHIVE_DB;
    incStep
}

lsntEnvironment() {
    printf "\nSTEP $STEP_COUNTER: Is this a local 'LSNT' database?\n";
    echo -n "Local DB? (Y\n) [ENTER]: "; 
    read LOCAL_DB;
    incStep
}

lsntDBCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' database?\n";
    echo "* WARNING * This is delete the current database";
    echo -n "Create DB? (Y\n) [ENTER]: "; 
    read CREATE_DB;
    incStep
}

adminDBCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' admin user?\n";
    echo "* WARNING * This is add a 'lsnt' user to the mysql user table";
    echo -n "Create Admin user? (Y\n) [ENTER]: ";
    read CREATE_ADMIN;
    incStep
}

dropTables() {
    printf "\nSTEP $STEP_COUNTER: Drop all the 'LSNT' tables?\n";
    echo "* WARNING * This is will delete all of the data";
    echo -n "Drop all tables? (Y\n) [ENTER]: ";
    read DROP_ALL_TABLES;
    incStep
}

isDropAllTables() {
    if [[ "$DROP_ALL_TABLES" == "Y" ]]
    then
        return true;
    else
        return false;
    fi
}

mysqlRootPassword() {
    printf "\nSTEP $STEP_COUNTER: What is your 'MYSQL' root user password?\n";
    echo "* INFO * All SQL statements are executed as the 'MYSQL root' user";
    read -p "Password:" -s MYSQL_ROOT_PASSWORD;
    printf "\n";
    incStep
}

adminPassword() {
    if [[ "$CREATE_ADMIN" == "Y" ]]
    then
        printf "\nSTEP $STEP_COUNTER: Set the 'LSNT' admin user password.\n";
        read -p "Password:" -s ADMIN_PASSWORD;
        echo ""
        read -p "Confirm password?:" -s CONFIRM_ADMIN_PASSWORD;
        if [[ "$ADMIN_PASSWORD" != "$CONFIRM_ADMIN_PASSWORD" ]]
        then
            adminPassword
        else
            incStep
        fi
    fi
}

testDataCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the Test Data?\n";
    echo "* WARNING * This is only for local Databases";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_TEST_DATA;
    incStep
}

categoryTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' category table?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_CATEGORY_TABLE;
    incStep
}

subCategoryTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' subCategory table?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_SUB_CATEGORY_TABLE;
    incStep
}

brandTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' brand table?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_BRAND_TABLE;
    incStep
}

packageTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' package tables?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_PACKAGE_TABLE;
    incStep
}

vendorLinkTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' vendorLink tables?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_VENDOR_LINK_TABLE;
    incStep
}

bulletPointTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' bulletPoint tables?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_BULLET_POINT_TABLE;
    incStep
}

keywordTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' keyword tables?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_KEYWORD_TABLE;
    incStep
}

itemTableCreation() {
    printf "\nSTEP $STEP_COUNTER: Create the 'LSNT' item table?\n";
    echo "* WARNING * This is delete the current table";
    echo -n "Create table? (Y\n) [ENTER]: "; 
    read CREATE_ITEM_TABLE;
    incStep
}

userInput() { 
    clear;
    printf "\n***********************************************";
    printf "\n* LSNT Database Installation           *";
    printf "\n***********************************************";
    printf "\n\n";
    echo "This script will install the 'LSNT' database.";
    printf "\n";
    archiveDatabase;
    cleanInstallation;
    lsntEnvironment;
    mysqlRootPassword;
    if [[ "$LOCAL_DB" == "Y" ]]
    then
        testDataCreation;
    fi
    runArchiveDatabaseScript
    if [[ "$CLEAN_DB_INSTALLATION" == "Y" ]]
    then
        lsntDBCreation;
        adminDBCreation;
        adminPassword;
    fi
    dropTables;
    if [[ "$DROP_ALL_TABLES" != "Y" ]]
    then
        categoryTableCreation;
        subCategoryTableCreation;
        brandTableCreation;
        itemTableCreation;
        keywordTableCreation;
        bulletPointTableCreation;
        vendorLinkTableCreation;
        packageLinkTableCreation;
    fi
}

runArchiveDatabaseScript() {
    if [[ "$ARCHIVE_DB" == "Y" ]]
    then
        ./backups/backup_db_script.sh -i Y -p $MYSQL_ROOT_PASSWORD  -d $LOCAL_DB
    fi
}

createDatabase() {
    if [[ "$CREATE_DB" == "Y" ]]
    then
        echo "Create Database";
        executeMySQLStatement "02_dbCreateDatabase.txt"
    fi
}

createAdmin() {
    if [[ "$CREATE_ADMIN" == "Y" ]]
    then
        echo "Create ADMIN";
        executeMySQLStatement "01_dbCreateAdminAndUsers.txt"
        mysqladmin -u lsnt password $ADMIN_PASSWORD
    fi
}

createBrandTable() {
    if [[ "$CREATE_BRAND_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "05_dbCreateBrandTable.txt"
    fi
}

createPackageTable() {
    if [[ "$CREATE_PACKAGE_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "10_dbCreatePackageTable.txt"
    fi
}

createVendorLinkTable() {
    if [[ "$CREATE_VENDOR_LINK_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "09_dbCreateVendorLinkTable.txt"
    fi
}

createBulletPointTable() {
    if [[ "$CREATE_BULLET_POINT_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "08_dbCreateBulletPointTable.txt"
    fi
}

createKeywordTable() {
    if [[ "$CREATE_KEYWORD_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "07_dbCreateKeywordTables.txt"
    fi
}

createItemTable() {
    if [[ "$CREATE_ITEM_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "06_dbCreateItemTable.txt"
    fi
}

createCategoryTable() {
    if [[ "$CREATE_CATEGORY_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "03_dbCreateCategoryTable.txt"
    fi
}

createSubCategoryTable() {
    if [[ "$CREATE_SUB_CATEGORY_TABLE" == "Y" || isDropAllTables ]]
    then
        executeDBStatement "04_dbCreateSubCategoryTable.txt"
    fi
}

createTestData() {
    if [[ "$CREATE_TEST_DATA" == "Y" ]]
    then
        CURRENT_DATABASE=$LSNT_TEST_DATABASE;
        createAllTables;
        executeDBStatement "100_dbCreateTestData.txt"
    fi
}

dropAllTables() {
    if [[ "$DROP_ALL_TABLES" == "Y" ]]
    then
        executeDBStatement "00_dbDropAllTables.txt"
    fi
}

createAllTables() {
    dropAllTables;
    createCategoryTable;
    createSubCategoryTable;
    createBrandTable;
    createItemTable;
    createKeywordTable;
    createBulletPointTable;
    createVendorLinkTable;
    createPackageTable;
}



userInput;
printf "\n\nWorking\n\n";
createAdmin;
createDatabase;
createAllTables;
createTestData;
