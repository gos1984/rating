<?php
return Array(
	"^(/|)$" => "home/index",
	"^account$" =>"account/index",
	"^auth$" =>"account/auth",
	"^registr$" =>"account/registr",
	"^forgot$" =>"account/forgot",
	"^confirm(\/$|\?.*$|$)$" =>"account/confirm",
	"^entry$" =>"account/entry",
	"^exit$" =>"account/exit",
	"^verification(\/$|\?.*$|$)" =>"account/verification",
	"^administrator(\/$|\?.*$|$)" =>"administrator/index",
	"^administrator\/(cat|quest)\/(\d{1,})" =>"administrator/index/$1/$2",
	"^administrator\/category(\?.*$|$)" =>"administrator/category",
	"^administrator\/modal(\?.*$|$)" =>"administrator/modal",
	"^administrator\/edit\/(category|modal|questions|answers)\?.*$" =>"administrator/edit/$1",
	"^administrator\/entry$" =>"administrator/entry",
	"^administrator\/answers$" =>"administrator/answers/$1",
	"^administrator\/answers\/(\d{1,})$" =>"administrator/answers/$1",
	"^administrator\/users$" =>"administrator/users",
	"^administrator\/users\/(\d{1,})$" =>"administrator/users/$1",
	"^quests$" =>"quests/index",
	"^quests/show(\/$|\?.*$|$)" =>"quests/show",
	"^results$" =>"quests/results",
	"^results/pdf$" =>"quests/pdf",
	"^bests$" =>"quests/bests"
);
?>