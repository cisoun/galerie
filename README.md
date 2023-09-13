Galerie
=======

A small photo gallery made in PHP/HTML/JS/CSS.

![preview_1000](https://github.com/cisoun/Galerie/assets/930282/124f6ab9-0276-4fde-8ef4-2affdc29c223)

## Features

 - No dependencies
 - Less than 100 lines of code
 - Responsive (masonery style)
 - Dark mode support
 - Custom lightbox with navigation by swiping or arrow keys
 - Lazy images loading (load on scroll)

## Installation

1) Copy [`index.php`](index.php) into a folder.
2) Copy your JPEG files into an `img` subfolder.

## F.A.Q

**Q: Can I use something else than JPEG?**
A: Yes. Just change the extension in the PHP code at the top of the file.

**Q: How can I prepare my photos easily?**
A: You can use GraphicsImagick (or ImageMagick) to optimise your photos.
For instance, put your photos in the folder of *Galerie* then run this command:

```sh
for i in *.jpg; do
	gm convert $i -resize 1500x1500 img/$(basename $i)
done
```

## License

Copyright © 2023  Cyriaque Skrapits

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see https://www.gnu.org/licenses.
