#! /usr/bin/perl -w

$database = 'trafix';
$username = 'root';
$password = 'iamroot';

print `mysqldump -u $username -p$password -d $database > ./schema.sql`;
print `mysqldump -u $username -p$password -t $database > ./data.sql`;
