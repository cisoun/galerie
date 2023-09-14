Galerie
=======

A small photo gallery made in PHP/HTML/JS/CSS.

![preview_1500](https://github.com/cisoun/Galerie/assets/930282/42f72615-c702-457d-8dbf-f730173aacbe)

## Features

 - No dependencies
 - Less than 100 lines of code
 - Responsive (masonery style)
 - Dark mode support
 - Custom lightbox with navigation by swiping or arrow keys
 - Lazy loading (load images on scroll)

## Installation

1) Copy [index.php](index.php) into a folder.
2) Create a "img" subfolder and copy your JPEG files inside.

## F.A.Q

> Can I use something else than JPEG?

Yes. Just change the extension in the PHP code at the top of the file.

> How can I prepare my photos easily?

You can use GraphicsImagick (or ImageMagick) to optimise your photos.  
For instance, put your photos in the folder of *Galerie* then run this command:

```sh
for i in *.jpg; do
	gm convert $i -resize 1500x1500 img/$(basename $i)
done
```

> I don't need lazy loading, how can I remove it?

Remove the `getimagesize` PHP call and `loading="lazy"` attribute in the `<img>` element.  
On a personal note, lazy loading can make sense in an album, especially if you show pictures in high definition that cost you bandwidth. The best situation would be balancing the quality vs size of the pictures. This way, you could just ignore lazy loading.

## License

Copyright © 2023  Cyriaque Skrapits

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see https://www.gnu.org/licenses.
