<?php

$splitBetween = [
  'marriedPerson1',
  'marriedPerson2',
  'friend',
];

$expenses = [
  'marriedPerson1' => 300.75,
  'marriedPerson2' => 50.28,
  'friend' => 200.00,
];

$groups = [
  'marriedCouple' => ['marriedPerson1', 'marriedPerson2'],
  'friend' => ['friend'],
];


// find the group for a given member
$getGroupForMember = function($member) use ($groups) {
  foreach($groups as $group => $members) {
    if (in_array($member, $members)) {
      return $group;
    }
  }

  throw new Exception("$member not in any group.\n");
};

// who owes what by group weighted by the number of people in the group
foreach($expenses as $payee => $amount) {
  $amountPerPerson = $amount / count($splitBetween);
  foreach($groups as $group => $members) {
    if (!in_array($payee, $members)) {
      $owedTo[$getGroupForMember($payee)][$group] = $amountPerPerson * count($members);
    }
  }
}

// normalize the group owed amounts by subtracting who owes whom
foreach($owedTo as $owedToGroup => $owedBy) {
  foreach($owedBy as $owedByGroup => $owedAmount) {
    $normalizedAmount = $owedAmount - $owedTo[$owedByGroup][$owedToGroup];
    if ($normalizedAmount > 0) {
      $normalizedOwed[$owedToGroup][$owedByGroup] = $normalizedAmount;
    }
  }
}

// print the results
foreach($normalizedOwed as $owedBy => $owedTo) {
  print "$owedBy owes ";
  foreach($owedTo as $group => $amount) {
    print $group . ' $' . $amount . "\n";
  }
}
