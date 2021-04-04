import slugify from "slugify"

export default function slug(value: string): string {
    return slugify(value, {
        replacement: '-',
        remove: undefined,
        lower: true,
        strict: true,
        locale: 'en',
    })
}