<?php
$query = $em->createQuery(" SELECT m FROM Entities\Member m ");
$arr = $query->getArrayResult();
$retval['return'] = $arr;