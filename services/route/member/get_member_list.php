<?php
$entities=array(
  "Member"
);
loadEntities($entities);

$query = $em->createQuery(" SELECT m FROM \entity\Member m ");
$retval = $query->getArrayResult();