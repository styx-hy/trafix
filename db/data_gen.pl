#! /usr/bin/perl -w
use DBI;

sub rand_str() {
    $maxlen = 30;
    @a = (0..9, 'a'..'z', 'A'..'Z', '_');
    $rand_str = join '', map { $a[int rand @a]} 0..($maxlen - 1);
    return $rand_str;
}

my $dbh = DBI->connect("DBI:mysql:database=trafix;host=localhost", "root", "iamroot", {'RaiseError' => 1});

##############################
# test query
##############################
# my $query = $dbh->prepare("SELECT * FROM driver");
# $query->execute();

# while (my $ref = $query->fetchrow_hashref()) {
#     print "$ref->{driver_id}";
#     print "$ref->{name}";
#     print "$ref->{drive_age}";
#     print "$ref->{assigned}\n";
# }

my @array = (1..10000);
$insert_query = 'INSERT INTO driver (name, drive_age, assigned) values ';
foreach $a (@array) {
    $value = '('.join(',', '"'.rand_str().'"', int rand() * 20, int rand() * 2).')';
    push @values, $value;
}
$insert_query .= join(',', @values);
# print $insert_query;
$dbh->do($insert_query);

# @values = ();
# $insert_query = 'INSERT INTO coach (type, age, repair, seat) values ';
# foreach $a (@array) {
#     $value = '('.join(',', int rand() * 4, int rand() * 60, int rand() * 2, 10 * int rand() * 5 + 1).')';
#     push @values, $value;
# }
# $insert_query .= join(',', @values);
# $dbh->do($insert_query);
$dbh->disconnect();
